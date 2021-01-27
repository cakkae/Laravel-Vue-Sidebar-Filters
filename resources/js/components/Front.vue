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
                                        <input type="number" name="quantity" id="quantity" min="0" value="0" class="form-control quantity">
                                    </td>
                                    <td> 
                                        <div class="price-wrap"> 
                                            <var class="price">{{ product.price+' KM' }} </var> 
                                        </div> 
                                    </td>
                                    <td> 
                                        <button type="button" class="btn-primary btn btn-block">
                                            <i class="fal fa-shopping-cart"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4 text-center my-auto">
                <h4>
                    <i class="fal fa-shopping-cart fa-3x"></i>
                </h4>
                <h4>Vaša korpa je prazna</h4>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                prices: [],
                categories: [],
                parents: [],
                manufacturers: [],
                products: [],
                loading: true,
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
        },

        watch: {
            selected: {
                handler: function () {
                    this.loadCategories();
                    this.loadParents();
                    this.loadManufacturers();
                    this.loadPrices();
                    this.loadProducts();
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
