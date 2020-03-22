<template>
    <div class="container">

    <a href="#create" data-toggle="collapse" class="btn btn-success">新增</a>

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
                    <label for="content">故事內容</label>
                    <input type="text" class="form-control" v-model="input.content" id="content" name="content">
                </div>
                <div class="form-group">
                    <label for="title">故事標題</label>
                    <input type="text" class="form-control" v-model="input.title" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="liqueur_id">產品系列</label>
                    <select name="liqueur_id" id="" v-model="input.id" class="form-control" >
                        <option :value="item.id" v-for="item in input.liqueur_kind">
                            {{ item.name }}
                        </option>
                    </select>
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
                <th>sort</th>
                <th width='80px'>action</th>
            </tr>
        </thead>
        <tbody class="tbody">

            <tr v-for="item in liqueur_text">
                <td>
                    <img :src="item.img" alt="" srcset="" class="img-fluid">
                </td>
                <td>
                    <th>{{ item.id }}</th>
                </td>
                <td>
                    {{ item.title}}
                </td>

                <td>
                    {{ item.content}}
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
            axios.post('/admin/liqueurStory_kind')
                .then(response=>this.input.liqueur_kind = response.data)
                .catch(function (error) {
                    console.log(error);
                });
            //獲取酒的故事
            axios.post('/admin/liqueurStory_text')
                .then(response=>{this.liqueur_text = response.data
                    this.upload()
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        data(){
            return{

                liqueur_text:[],
                input:{
                    newimg:null,
                    oldimg:null,
                    content:'',
                    title:'',
                    liqueur_kind:null,
                    id:'',
                    sort:0,
                }
            }
        },
        methods:{
            //按下submit
            store(){
                axios.post('/admin/liqueurStory',{
                    liqueur_id:this.input.id,
                    img:this.input.oldimg,
                    content:this.input.content,
                    title:this.input.title
                })
                .then((res)=>{
                    this.liqueur_text.push(res.data)
                })
                .catch(function (error) {
                    console.log(error);
                });

                this.clear();
                alert('成功');
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
                    axios.post('/admin/liqueurStory_upload_img',fd)
                    .then(response=>this.input.oldimg = response.data)
                    .catch(function (error) {
                        console.log(error);
                    });
                }else{
                    axios.post('/admin/liqueurStory_delete_img',{file_link:this.input.oldimg})
                    .then(function(response){
                        console.log(response);

                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                    this.input.newimg = event.target.files[0]
                    const fd = new FormData();
                    fd.append('file',this.input.newimg, this.input.newimg.name)
                    axios.post('/admin/liqueurStory_upload_img',fd)
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
                this.id = ''
                $('#img').val('')
            }

        }
    }
</script>
