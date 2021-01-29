<template>
    <div class="flex flex-wrap mx-8 my-8 container" :class="{'loading': loading}">
            <div class="w-full sm:w-full md:w-1/2 lg:w-1/4 xl:w-1/4 mt-5 px-2">
                <h1>Filteri</h1>
                <h2 class="mx-4 my-2">Cijena</h2>
                <hr/>
                <div class="form-check mx-4 my-2" v-for="(price, index) in prices">
                    <input class="form-check-input" type="checkbox" :value="index" :id="'price'+index" v-model="selected.prices">
                    <label class="form-check-label" :for="'price' + index">
                        {{ price.name }} ({{ price.products_count }})
                    </label>
                </div>
                <h2 class="mx-4 my-2">Kategorije</h2>
                <hr/>
                <div class="mx-4 my-2" v-for="(parent, index) in parents">
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
            <div class="w-full sm:w-full md:w-full lg:w-1/2 xl:w-1/2 mt-5 px-2">
            <h1>Proizvodi</h1>
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Proizvod</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Kolicina</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Cijena</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Akcija</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <tr v-for="product in products">
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <div class="text-sm leading-5 text-blue-900">{{ product.name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="custom-number-input h-10 w-32">
                                    <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                                        <button @click="decrement(product)" class=" bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                            <span class="m-auto text-2xl font-thin">−</span>
                                        </button>
                                        <input type="number" v-model="product.quantity" class="outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="custom-input-number" value="0"></input>
                                        <button @click="increment(product)" class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                            <span class="m-auto text-2xl font-thin">+</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ product.price+' KM' }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5">
                                <button type="button" ref="updateButton" class="px-5 py-2 rounded transition duration-300 hover:bg-blue-700 hover:text-white text-white bg-primary focus:outline-none" @click="addToCart(product)">
                                    <i class="fal fa-shopping-cart"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="w-full sm:w-full md:w-1/2 lg:w-1/4 xl:w-1/4 mt-5 px-2">
                 <shopping-cart inline-template :items="cartItems">
                   <div>
                      <div v-for="(item, index) in items" class="cart-container">
                        <div class="w-full sm:w-full md:w-full lg:w-full xl:w-full mt-5 px-2">
                            <div class="text-sm leading-5 text-white">{{ item.name }}</div>
                        </div>
                        <div class="grid grid-cols-3 gap-4 mt-2 px-2">
                            <div class="col-span-2">
                                <div class="text-sm leading-5 text-white">{{item.price | formatCurrency}} KM x {{item.quantity | formatCurrency}}</div>
                            </div>
                            <div class="">
                                <button type="button" @click="removeItem(item, index)" class="color-primary px-2 py-1 rounded transition duration-300 bg-white focus:outline-none">
                                    <i class="fal fa-trash"></i> Izbriši
                                </button>
                            </div>
                        </div>
                        </div>
                    <div v-show="items.length === 0">
                        <h4>
                            <i class="fal fa-shopping-cart fa-3x"></i>
                        </h4>
                        <h4>Vaša korpa je prazna</h4>
                    </div>
                    <div v-show="items.length > 0">
                        <h3 class="bg-primary text-white mt-3 py-2 px-3" style="border-radius: 5px; font-weight: bold;">Ukupno: {{Total | formatCurrency}} KM</h3>
                        <button type="button" @click="removeItem(item.id, index)" class="w-full px-5 py-2 my-4 rounded transition duration-300 hover:bg-blue-700 hover:text-white text-white bg-primary focus:outline-none">
                            <i class="fal fa-trash"></i> NARUČI
                        </button>
                    </div>
                  </div>
                  <!-- /.container -->
               </shopping-cart>
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
		removeItem(item, index) {
             axios.post('/api/remove', {
                    user: this.$userId,
                    id: item.id
                })
                .then(response =>  {
                    this.$notify(
                        {
                        group: "top",
                        title: "Uspješno!",
                        text: "Proizvod "+item.name+" uspješno izbrisan"
                        },
                        4000
                    );
                    this.items.splice(index, 1)
                })
                .catch(error => {
                    this.$notify(
                        {
                        group: "bottom",
                        title: "Greška!",
                        text: "Dogodila se greška prilikom brisanja!"
                        },
                        4000
                    );
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
            
            decrement(item) {
                item.quantity -= 1
            },

            increment(item) {
                item.quantity += 1
            },

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
                        Object.keys(response.data).forEach(key => {
                            this.cartItems.push(Vue.util.extend({}, response.data[key]));

                        });
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
                                this.$notify(
                                {
                                    group: "top",
                                    title: "Uspješno!",
                                    text: "Proizvod "+itemToAdd.name+" uspješno dodan!"
                                    },
                                    4000
                                );
                            }
                            else
                            {
                                this.$notify(
                                {
                                    group: "bottom",
                                    title: "Greška!",
                                    text: response.data.message
                                    },
                                );   
                            }
                                alert()
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
                                itemInCart[0].quantity = itemToAdd.quantity
                                this.$notify(
                                {
                                    group: "top",
                                    title: "Uspješno!",
                                    text: "Proizvod "+itemToAdd.name+" uspješno ažuriran!"
                                    },
                                    4000
                                );
                            }
                            else
                            {
                                this.$notify(
                                {
                                    group: "bottom",
                                    title: "Greška!",
                                    text: "Nema dovoljno na stanju"
                                    },
                                    4000
                                );
                            }
                                
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

<style>
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

.custom-number-input input:focus {
  outline: none !important;
}

.custom-number-input button:focus {
  outline: none !important;
}

button span {
  line-height: 35px;
}

.vertical-center {
  margin: 0;
  position: absolute;
  top: 50%;
  -ms-transform: translateY(calc(50% - 60px));
  transform: translateY(calc(50% - 60px));
}
</style>