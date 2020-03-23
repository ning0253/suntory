<template>
    <div class="container">

    <a href="#create" data-toggle="collapse" class="btn btn-success">新增</a>
    <hr>

    <div class="collapse" id="create">
        <div class="card card-body">
            <form method="post" action="#" enctype="multipart/form-data" id="form1" @submit.prevent="store()">
                <div class="form-group">
                    <div class="col-4">
                        <img :src="input.oldimg" alt="" srcset="" class="img-fluid ">
                    </div>

                    <label for="img">圖片</label>
                    <input type="file" class="form-control" @change="processFile($event)" id="img" name="img" value ="">
                </div>
                <div class="form-group">
                    <label for="title">產品名稱</label>
                    <input type="text" class="form-control" v-model="input.title" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="liqueur_id">產品系列</label>
                    <select name="liqueur_id" id="liqueur_id" v-model="input.liqueur_id" class="form-control" >
                        <option :value="item.id" v-for="item in input.liqueur_kind">
                            {{ item.name }}
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="content">產品內容</label>
                    <input type="text" class="form-control" v-model="input.content" id="content" name="content">
                </div>
                <div class="form-group">
                    <label for="capacity">產品容量</label>
                    <input type="text" class="form-control" v-model="input.capacity" id="capacity" name="capacity">
                </div>
                <div class="form-group">
                    <label for="density">酒精濃度</label>
                    <input type="text" class="form-control" v-model="input.density" id="density" name="density">
                </div>
                <div class="form-group">
                    <label for="color">色澤</label>
                    <input type="text" class="form-control" v-model="input.color" id="color" name="color">
                </div>
                <div class="form-group">
                    <label for="aroma">香氣</label>
                    <input type="text" class="form-control" v-model="input.aroma" id="aroma" name="aroma">
                </div>
                <div class="form-group">
                    <label for="body">酒體</label>
                    <input type="text" class="form-control" v-model="input.body" id="body" name="body">
                </div>
                <div class="form-group">
                    <label for="taste">味覺</label>
                    <input type="text" class="form-control" v-model="input.taste" id="taste" name="taste">
                </div>
                <div class="form-group">
                    <label for="aftertaste">餘覺</label>
                    <input type="text" class="form-control" v-model="input.aftertaste" id="aftertaste" name="aftertaste">
                </div>
                <div class="form-group">
                    <label for="price">價錢</label>
                    <input type="number" class="form-control" v-model="input.price" id="price" name="price">
                </div>
                <div class="form-group">
                    <label for="note">備註</label>
                    <input type="text" class="form-control" v-model="input.note" id="note" name="note">
                </div>
                <button type="submit" class="btn btn-primary" data-toggle="collapse"
                    data-target="#create">Submit</button>
            </form>
        </div>
    </div>
    <table id="example" class="table table-striped table-bordered " style="width:100%">
        <thead>
            <tr>
                <th>img</th>
                <th>kind</th>
                <th>title</th>
                <th>content</th>
                <th>capacity</th>
                <th>density</th>
                <th>color</th>
                <th>aroma</th>
                <th>body</th>
                <th>taste</th>
                <th>aftertaste</th>
                <th>price</th>
                <th>note</th>
                <th>sort</th>
                <th width='80px'>action</th>
            </tr>
        </thead>
        <tbody class="tbody">
            <tr v-for="(item,index) in product_data " :key="index">
                <td>
                    <img :src="item.img" alt="" srcset="" class="img-fluid">
                </td>
                <td>
                    {{ item.liqueur.name}}
                </td>
                <td>
                    {{ item.title}}
                </td>
                <td>
                    {{ item.content}}
                </td>
                <td>
                    {{ item.capacity}}
                </td>
                <td>
                    {{ item.density}}
                </td>
                <td>
                    {{ item.color}}
                </td>
                <td>
                    {{ item.aroma}}
                </td>
                <td>
                    {{ item.body}}
                </td>
                <td>
                    {{ item.taste}}
                </td>
                <td>
                    {{ item.aftertaste}}
                </td>
                <td>
                    {{ item.price}}
                </td>
                <td>
                    {{ item.note}}
                </td>
                <td v-if="item.sort == null">
                    0
                </td>
                <td v-else>
                    {{ item.sort }}
                </td>
                <td>
                    <a href="" class="btn btn-success btn-sm" data-toggle="collapse">修改</a>
                    <button class="btn btn-danger btn-sm" onclick="show_confirm()">刪除</button>
                </td>
                <div class="collapse" id="">
                    <div class="card card-body">

                    </div>
                </div>
                <div class="collapse" id="">
                    <div class="card card-body">

                    </div>
                </div>
            </tr>



        </tbody>


    </table>

</div>
</template>

<script>
    import axios from 'axios';
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            //獲取酒的種類
            axios.post('/admin/liqueurProduct_kind')
                .then(response=>this.input.liqueur_kind = response.data)
                .catch(function (error) {
                    
                });
            //獲取酒的產品
            axios.post('/admin/liqueurProduct_text')
                .then(response=>{this.product_data = response.data
                    this.upload()
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        data(){
            return{
                product_data:[],
                input:{
                    newimg:null,
                    oldimg:null,
                    liqueur_id:'',
                    liqueur_kind:null,
                    title:'',
                    content:'',
                    capacity:'',
                    density:'',
                    color:'',
                    aroma:'',
                    body:'',
                    taste:'',
                    aftertaste:'',
                    price:'',
                    note:'',
                    sort:0,
                }
            }
        },
        methods:{
            //按下submit
            store(){
                axios.post('/admin/liqueurProduct',{
                    liqueur_id:this.input.liqueur_id,
                    img:this.input.oldimg,
                    content:this.input.content,
                    title:this.input.title,
                    capacity:this.input.capacity,
                    density:this.input.density,
                    color:this.input.color,
                    aroma:this.input.aroma,
                    body:this.input.body,
                    taste:this.input.taste,
                    aftertaste:this.input.aftertaste,
                    price:this.input.price,
                    note:this.input.note
                })
                .then((res)=>{
                    console.log(res);

                    this.product_data.push(res.data)
                })
                .catch(function (error) {
                    console.log(error);
                });

                this.clear();
                //alert('成功');
            },
            //當頁面讀取完成後執行datatable
            upload(){
                $(document).ready(function() {
                    $('#example').DataTable({
                        "order": [ 1, 'desc' ]
                    });
                })
            },
            //判斷是否有圖片上傳
            processFile(event) {
                if(this.input.oldimg == null){
                    this.input.newimg = event.target.files[0]
                    const fd = new FormData();
                    fd.append('file',this.input.newimg, this.input.newimg.name)
                    axios.post('/admin/liqueurProduct_upload_img',fd)
                    .then(response=>this.input.oldimg = response.data)
                    .catch(function (error) {
                        console.log(error);
                    });
                }else{
                    axios.post('/admin/liqueurProduct_delete_img',{file_link:this.input.oldimg})
                    .then(function(response){
                        console.log(response);

                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                    this.input.newimg = event.target.files[0]
                    const fd = new FormData();
                    fd.append('file',this.input.newimg, this.input.newimg.name)
                    axios.post('/admin/liqueurProduct_upload_img',fd)
                    .then(response=>this.input.oldimg = response.data)
                    .catch(function (error) {
                        console.log(error);
                    });
                }

            },
            //清除表單資料
            clear(){
                this.input.newimg = null,
                this.input.oldimg = '',
                this.content = '',
                this.title = '',
                this.id = '',
                this.capacity='',
                this.density='',
                this.color='',
                this.aroma='',
                this.body='',
                this.taste='',
                this.aftertaste='',
                this.price='',
                this.note='',
                $('#img').val('')
            }

        }
    }
</script>
