<template>
    <div id="app">
        <div class="container mt-3 mt-sm-5">
            <div class="row justify-content-between mb-3">
                <div class="col-md-9">
                    <h1 class="display-1">Shop</h1>
                </div>
                <div class="col-md-3 text-right"><button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#cart" @click="cartTotal"><i class="fa fa-shopping-cart"></i> {{ Object.keys(cart).length }}</button></div>
            </div>
            <div class="row">
                <div class="col-md-3" v-for="(item,index) in selling" :key="index">
                    <div class="card"><img class="card-img-top" :src="item.img" :alt="item.name" />
                        <div class="card-block">
                            <h4 class="card-title">{{ item.title }}</h4>
                            <div class="card-text">${{ item.price}}</div>
                            <div class="row justify-content-end"><button class="btn btn-primary" @click="addToCart(index)" >Add to cart</button></div>
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
                                        <th>單價</th>
                                        <th>總價</th>
                                        <th></th>
                                    </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item,index) in cart" :key="index">
                                    <td >{{item.name}}</td>
                                    <td style="width:50px">
                                        <input type="number" v-model="item.quantity" @change="change(index)" min="1">
                                    </td>
                                    <td >{{item.price}}</td>
                                    <td>${{ item.price *item.quantity}}</td>
                                    <th>
                                        <button class="btn-sm btn-danger">
                                            <span>刪除</span>
                                        </button>
                                    </th>

                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{{countQuantity }}</td>
                                    <td><strong >${{ total }}</strong></td>
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
    created() {
        //獲取產品
        axios
            .post("/admin/liqueurProduct_text")
            .then(response => {
                this.selling = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });
        axios.get('/totalcart')
            .then((res)=>{
               this.cart = res.data

            }).catch((err)=>{
                console.log(err);

            })
    },
    data: function () {
        return {
            cart: {
            },
            selling: [],

        }
    },
    computed:{
        countQuantity:function(){
					var countQuantity=0;
					for (var i in this.cart) {
						countQuantity += parseInt(this.cart[i].quantity);
					}
					return countQuantity;
                },
        total:function(){
					var total=0;
					for (var i in this.cart) {
						total += parseInt(this.cart[i].price * this.cart[i].quantity);
					}
					return total;
				},
	},
    methods: {

        addToCart(index) {
            axios.post('/addcart',this.selling[index])
            .then((res)=>{
                // this.cart.push(res.data)
                console.log(res);

            }).catch((err)=>{
                console.log(err);

            })
        },
        cartTotal(){
            //總價
             axios.get('/getcontent')
            .then((res)=>{


            }).catch((err)=>{
                console.log(err);

            })
            //總數
            axios.get('/totalcart')
            .then((res)=>{
                this.cart=res.data
            }).catch((err)=>{
                console.log(err);

            })
        },
        change(){
            console.log('change');

            //總價
             axios.get('/getcontent')
            .then((res)=>{


            }).catch((err)=>{
                console.log(err);

            })
        }

    }
}
// axios.post('/addcart',this.selling[index])
//             .then((res)=>{
//                 console.log(res);


//             }).catch((err)=>{
//                 console.log(err);

//             })
</script>



