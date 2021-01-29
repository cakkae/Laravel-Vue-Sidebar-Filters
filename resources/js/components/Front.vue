<template>
    <div class="container-fluid" :class="{'loading': loading}">
        <div class="row">
            <div class="col-lg-3 mb-4">
                <h1 class="mt-4">Filteri</h1>

                <h3 class="mt-2">Cijena</h3>
                <div class="form-check" v-for="(price, index) in prices">
                    <input class="form-check-input" type="checkbox" :value="index" :id="'price'+index" v-model="selected.prices">
                    <label class="form-check-label" :for="'price' + index">
                        {{ price.name }} ({{ price.products_count }})
                    </label>
                </div>

                <h3 class="mt-2">Kategorije</h3>
                <div v-for="(parent, index) in parents">
                    <badger-accordion>
                        <badger-accordion-item>
                            <template slot="header">{{ parent.name }}</template>
                            <template slot="content" v-for="(category, index) in categories" v-if="(category.parent_id == parent.id)">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" :value="category.id" :id="'category'+index" v-model="selected.categories">
                                    <label class="form-check-label" :for="'category' + index">
                                        {{ category.name }} ({{ category.products_count }})
                                    </label>
                                </div>
                            </template>
                            <template slot="content" v-else>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" :value="parent.id" :id="'parent'+index" v-model="selected.categories">
                                    <label class="form-check-label" :for="'parent' + index">
                                        {{ parent.name }} ({{ parent.products_count }})
                                    </label>
                                </div>
                            </template>
                        </badger-accordion-item>
                    </badger-accordion>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row mt-4">
                    <div class="card">
                        <table class="table table-hover shopping-cart-wrap">
                            <thead class="text-muted">
                                <tr>
                                    <th scope="col" width="50%">Proizvod</th>
                                    <th scope="col" width="10%">Kolicina</th>
                                    <th scope="col" width="20%">Cijena</th>
                                    <th scope="col" width="20%">Akcija</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="product in products">
                                    <td>
                                        <h6 class="title">{{ product.name }}</h6>
                                        <dl class="param param-inline small">
                                            <dt>Kategorija:</dt>
                                            <dd>Ime kategorije</dd>
                                        </dl>
                                    </td>
                                    <td>
                                        <input type="number" v-model="product.quantity" class="form-control quantity">
                                    </td>
                                    <td>
                                        <div class="price-wrap">
                                            <var class="price">{{ product.price+' KM' }} </var>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" ref="updateButton" class="btn-primary btn btn-block" @click="addToCart(product)">
                                            <i class="fal fa-shopping-cart"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <shopping-cart inline-template :items="cartItems">
                  <div>
                    <div class="row mt-4" v-for="(item, index) in items" >
                        <div class="col-md-12">
                            <h6 class="title">{{ item.name }}</h6>
                        </div>
                        <div class="col-md-8">
                            <input v-model="item.quantity" class="form-control input-quantity" type="number">
                        </div>
                        <div class="col-md-4">
                            <button class="btn-danger btn btn-block" @click="removeItem(item.id, index)">
                                <i class="fal fa-trash"></i>
                            </button>
                        </div>
                        <div class="col-md-12">
                            <strong>Ukupno: {{item.price | formatCurrency}} KM x {{item.quantity | formatCurrency}}</strong>
                        </div>
                    </div>
                    <div class="row mt-4 text-center" v-show="items.length === 0">
                        <div class="col-md-12">
                            <h4>
                                <i class="fal fa-shopping-cart fa-3x"></i>
                            </h4>
                            <h4>Vaša korpa je prazna</h4>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-4" v-show="items.length > 0">
                        <div class="col-md-4">
                            <h4>Ukupno:</h4>
                        </div>
                        <div class="col-md-8">
                            <h4>{{Total | formatCurrency}} KM</h4>
                        </div>
                    </div>
                  </div>
                  <!-- /.container -->
               </shopping-cart>
            </div>
        </div>
    </div>
</template>

<script>

function formatNumber(n, c, d, t) {
	var c = isNaN((c = Math.abs(c))) ? 2 : c,
		d = d === undefined ? "." : d,
		t = t === undefined ? "," : t,
		s = n < 0 ? "-" : "",
		i = String(parseInt((n = Math.abs(Number(n) || 0).toFixed(c)))),
		j = (j = i.length) > 3 ? j % 3 : 0;
	return (
		s +
		(j ? i.substr(0, j) + t : "") +
		i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) +
		(c
			? d +
			  Math.abs(n - i)
					.toFixed(c)
					.slice(2)
			: "")
	);
}

// Allow the formatNumber function to be used as a filter
Vue.filter("formatCurrency", function (value) {
	return formatNumber(value, 2, ".", ",");
});

Vue.component("shopping-cart", {
	props: ["items"],

    data: function () {
        return {
            cartItems: [],
        }
    },

	computed: {
		Total() {
			let total = 0;
			this.items.forEach((item) => {
				total += item.price * item.quantity;
			});
			return total;
		}
	},

	methods: {
		// Remove item by its index
		removeItem(id, index) {
             axios.post('/api/remove', {
                    user: this.$userId,
                    id: id
                })
                .then(response =>  this.items.splice(index, 1))
                .catch(error => {
                    console.log(error);
            });
        },

        updateCart(itemToAdd) {
            let itemInCart = this.cartItems.filter(item => item.id===itemToAdd.id);
            axios.post('/api/update', {
                    user: this.$userId,
                    id: itemToAdd.id,
                    quantity: itemToAdd.quantity
                })
                .then(response =>  itemInCart.quantity = itemToAdd.quantity)
                .catch(error => {
                    console.log(error);
            });
        },
	}
});
    export default {
        data: function () {
            return {
                prices: [],
                categories: [],
                parents: [],
                manufacturers: [],
                products: [],
                loading: true,
                cartItems: [],
                selected: {
                    prices: [],
                    categories: [],
                    manufacturers: [],
                    parents: []
                }
            }
        },

        mounted() {
            this.loadCategories();
            this.loadParents();
            this.loadManufacturers();
            this.loadPrices();
            this.loadProducts();
            this.loadCart();
        },

        watch: {
            selected: {
                handler: function () {
                    this.loadCategories();
                    this.loadParents();
                    this.loadManufacturers();
                    this.loadPrices();
                    this.loadProducts();
                    this.addToCart();
                },
                deep: true
            }
        },

        methods: {
            loadCategories: function () {
                axios.get('/api/categories', {
                        params: _.omit(this.selected, 'categories')
                    })
                    .then((response) => {
                        this.categories = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            loadCart: function () {
                    axios.get('/api/cart', {
                        params: {
                            user: this.$userId
                        }
                    })
                    .then((response) => {
                        for(var i=1;i<Object.keys(response.data).length;i++)
                            this.cartItems.push(Vue.util.extend({}, response.data[i]));
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            addToCart(itemToAdd) {
                let found = false;
                let itemInCart = this.cartItems.filter(item => item.id===itemToAdd.id);
                let isItemInCart = itemInCart.length > 0;

                if (isItemInCart === false) {
                    axios.post('/api/add', {
                            user: this.$userId,
                            id: itemToAdd.id,
                            name: itemToAdd.name,
                            price: itemToAdd.price,
                            quantity: itemToAdd.quantity
                        })
                        .then((response) => {
                            if(response.data.status)
                            {
                                this.cartItems.push(Vue.util.extend({}, itemToAdd));
                                alert(response.data.message)
                            }
                            else
                                alert(response.data.message)
                        })
                        .catch(error => {
                            console.log(response.data.status);
                            console.log(error);
                        });
                } else
                {
                    axios.post('/api/update', {
                            user: this.$userId,
                            id: itemToAdd.id,
                            quantity: itemToAdd.quantity
                        })
                        .then((response) => {
                            if(response.data.status)
                            {
                                itemInCart[0].quantity += itemToAdd.quantity
                                alert(response.data.message)
                            }
                            else
                                alert(response.data.message)
                        })
                        .catch(error => {
                            console.log(error);
                    });
                }
            },

            loadParents: function () {
                axios.get('/api/parents', {
                        params: _.omit(this.selected, 'parents')
                    })
                    .then((response) => {
                        this.parents = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            /*loadsubCategories: function () {
                axios.get('/api/subCategories', {
                        params: _.omit(this.selected, 'subCategories')
                    })
                    .then((response) => {
                        this.subCategories = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },*/

            loadProducts: function () {
                axios.get('/api/products', {
                        params: this.selected
                    })
                    .then((response) => {
                        this.products = response.data.data;
                        this.loading = false;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            loadManufacturers: function () {
                axios.get('/api/manufacturers', {
                        params: _.omit(this.selected, 'manufacturers')
                    })
                    .then((response) => {
                        this.manufacturers = response.data.data;
                        this.loading = false;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            loadPrices: function () {
                axios.get('/api/prices', {
                        params: _.omit(this.selected, 'prices')
                    })
                    .then((response) => {
                        this.prices = response.data;
                        this.loading = false;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    }
</script>
