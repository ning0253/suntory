<template>
    <div id="app">
        <div class="container mt-3 mt-sm-5">
            <div class="row justify-content-between mb-3">
                <div class="col-md-9">
                    <h1 class="display-1">Shop</h1>
                </div>
                <div class="col-md-3 text-right"><button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#cart"><i class="fa fa-shopping-cart"></i> {{ cart.length }}</button></div>
            </div>
            <div class="row">
                <div class="col-md-3" v-for="item in selling">
                    <div class="card"><img class="card-img-top" :src="item.image" :alt="item.name" />
                        <div class="card-block">
                            <h4 class="card-title">{{ item.name }}</h4>
                            <div class="card-text">${{ item.price / 100 }}</div>
                            <div class="row justify-content-end"><button class="btn btn-primary" @click="addToCart" :data-id="item.id">Add to cart</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="cart">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cart</h5><button class="close" type="button" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                    <tr>
                                        <th>品名</th>
                                        <th>數量</th>
                                        <th>價錢</th>
                                    </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in cart">
                                    <td>{{ item.name }}</td>
                                    <td></td>
                                    <td>${{ item.price / 100 }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td><strong>${{ cartTotal / 100 }}</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="modal-footer"><button class="btn btn-secondary" data-dismiss="modal">Continue shopping</button><button class="btn btn-primary">Check out</button></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            cart: [],
            selling: [
                {
                    id: 1,
                    image: '//placehold.it/200',
                    name: 'Doo-dad',
                    price: 999,
                },
                {
                    id: 2,
                    image: '//placehold.it/200',
                    name: 'Other Thing',
                    price: 1499,
                },
                {
                    id: 3,
                    image: '//placehold.it/200',
                    name: 'An Item',
                    price: 499,
                },
                {
                    id: 4,
                    image: '//placehold.it/200',
                    name: 'Thing',
                    price: 299,
                },
            ],
        }
    },
    computed: {
        cartTotal: function () {
            var i;
            var total = 0;

            for (i = 0; i < this.cart.length; i++) {
                total += this.cart[i].price;
            }

            return total;
        },
    },
    methods: {
        addToCart: function (e) {
            var i;
            var item;

            for (i = 0; i < this.selling.length; i++) {
                if (this.selling[i].id == e.target.getAttribute('data-id')) {
                    this.cart.push(this.selling[i]);
                    break;
                }
            }
        }
    }
}
</script>

<style>
</style>
