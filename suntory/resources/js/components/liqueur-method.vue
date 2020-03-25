<template>
    <div class="container">
        <a id="add" href="#create" data-toggle="collapse" class="btn btn-success" @click="clear()">新增</a>

        <hr />

        <div class="collapse" id="create">
            <div class="card card-body">
                <form method="post" action="#" id="form1" @submit.prevent="store(input.index)">
                    <div class="form-group">
                        <div class="col-4">
                            <img :src="input.oldimg" alt srcset class="img-fluid" />
                        </div>
                        <label for="img">蒸餾場內頁圖片</label>
                        <input v-if="this.input.edit == null" required type="file" class="form-control" @change="processFile($event)" id="img" name="img" value />
                        <input v-else type="file" class="form-control" @change="processFile($event)" id="img" name="img" value />
                    </div>
                    <div class="form-group">
                        <label for="liqueur_id">產品系列</label>
                        <select required name="liqueur_id" id="liqueur_id" v-model="input.liqueur_id" class="form-control">
                            <option v-for="(item, index) in liqueur_kind" :value="item.id" :key="index">{{ item.name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">蒸餾場內頁標題</label>
                        <input type="text" class="form-control" v-model="input.title" id="title" name="title" required />
                    </div>
                    <div class="form-group">
                        <label for="content">蒸餾場內頁內容</label><label for="content" id="warm" style="color: red;margin-left: 5px;" hidden="hidden">請輸入內容！</label>
                        <vue-editor class="" id="content" name="content" v-model="input.content" :editor-toolbar="customToolbar" @text-change="checkForInput" />
                    </div>
                    <div class="form-group" v-if="input.edit != null">
                        <label for="sort">權重</label>
                        <input type="number" class="form-control" v-model="input.sort" id="sort" name="sort" />
                    </div>

                    <button type="submit" class="btn btn-primary" data-target="#create">
                        儲存
                    </button>
                </form>
            </div>
            <hr />
        </div>

        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>蒸餾場內頁圖片</th>
                    <th>產品系列</th>
                    <th>蒸餾場內頁標題</th>
                    <th>蒸餾場內頁內容</th>
                    <th>權重</th>
                    <th width="80px"></th>
                </tr>
            </thead>
            <tbody class="tbody">
                <tr v-for="(item, index) in liqueur_method_data" :key="index">
                    <td>
                        <img :src="item.img" alt srcset class="img-fluid" />
                    </td>
                    <td>{{ item.liqueur.name }}</td>
                    <td>{{ item.title }}</td>
                    <td v-html="item.content"></td>
                    <td>{{ item.sort }}</td>
                    <td>
                        <a href="#create" class="btn btn-success btn-sm" data-toggle="collapse" @click="editdata(index)">修改</a>
                        <button class="btn btn-danger btn-sm" @click="deletedata(index)">
                            刪除
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from "axios";
import { VueEditor } from "vue2-editor";
export default {
    components: { VueEditor },
    mounted() {
        console.log("Component mounted.");
    },
    created() {
        //獲取酒的種類
        axios
            .post("/admin/liqueurMethod_kind")
            .then(response => (this.liqueur_kind = response.data))
            .catch(function (error) {
                console.log(error);
            });
        //獲取酒的蒸餾場內頁
        axios
            .post("/admin/liqueurMethod_text")
            .then(response => {
                this.liqueur_method_data = response.data;
                this.upload();
            })
            .catch(function (error) {
                console.log(error);
            });
    },
    data() {
        return {
            liqueur_method_data: [],
            liqueur_kind: null,
            input: {
                newimg: null,
                oldimg: null,
                liqueur_id: "",
                title: "",
                content: "",
                sort: 0,
                edit: null,
                index: null
            },
            customToolbar: [
                ["bold", "italic", "underline"],
                [{ list: "ordered" }, { list: "bullet" }],
                ["code-block"]
            ]
        };
    },
    methods: {
        checkForInput() {//偵測content變化
            if (this.input.content == "") {//未輸入文字
                $('#warm').removeAttr("hidden");
                $('#content').addClass('border border-danger');
            } else {
                $('#warm').attr('hidden', 'hidden');//有輸入文字
                $('#content').removeClass('border border-danger');
            }
        },
        //按下submit
        store(index) {
            if (this.input.content == "") {//content未輸入文字
                $('#warm').removeAttr("hidden");
                $('#content').addClass('border border-danger');
                return;
            }

            if (this.input.edit == null) {//新增
                axios
                    .post("/admin/liqueurMethod", {
                        liqueur_id: this.input.liqueur_id,
                        img: this.input.oldimg,
                        content: this.input.content,
                        title: this.input.title
                    })
                    .then(res => {
                        this.clear();
                        this.sweetalert("add");
                        this.liqueur_method_data.push(res.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            } else {//編輯
                axios
                    .put(`/admin/liqueurMethod/${this.input.edit}`, {
                        liqueur_id: this.input.liqueur_id,
                        img: this.input.oldimg,
                        content: this.input.content,
                        title: this.input.title,
                        sort: this.input.sort
                    })
                    .then(res => {
                        this.sweetalert("edit");
                        this.clear();
                        //兩個方法都可以重新渲染
                        this.$set(this.liqueur_method_data, index, res.data);
                        // this.liqueur_method_data.splice(index,1, res.data)
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        //當頁面讀取完成後執行datatable
        upload() {
            $(document).ready(function () {
                $("#example").DataTable({
                    order: [1, "desc"]
                });
            });
        },
        //刪除
        deletedata(index) {
            //console.log(index);
            let target = this.liqueur_method_data[index];

            Swal.fire({
                title: `確定要刪除 ${target.title} ?`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "確定",
                cancelButtonText: "取消"
            }).then(result => {
                if (result.value) {
                    axios
                        .delete("/admin/liqueurMethod/" + target.id)
                        .then(res => {
                            this.liqueur_method_data.splice(index, 1);
                            this.sweetalert("del");
                        })
                        .catch(err => {
                            console.log(err);
                        });
                }
            });
        },
        //讀取編輯資料
        editdata(index) {
            let target = this.liqueur_method_data[index];
            axios
                .get(`/admin/liqueurMethod/${target.id}/edit`)
                .then(res => {
                    //console.log(res.data);
                    let {
                        content,
                        img,
                        title,
                        id,
                        liqueur_id,
                        sort
                    } = res.data;
                    this.input.index = index;
                    this.input.edit = id;
                    this.input.oldimg = img;
                    this.input.liqueur_id = liqueur_id;
                    this.input.title = title;
                    this.input.content = content;
                    this.input.sort = sort;
                    // console.log(res.data)
                })
                .catch(err => {
                    console.log(err);
                });
        },
        //判斷是否有圖片上傳
        processFile(event) {
            if (this.input.oldimg == null) {
                this.input.newimg = event.target.files[0];
                const fd = new FormData();
                fd.append("file", this.input.newimg, this.input.newimg.name);
                axios
                    .post("/admin/liqueurMethod_upload_img", fd)
                    .then(response => (this.input.oldimg = response.data))
                    .catch(function (error) {
                        console.log(error);
                    });
            } else {
                axios
                    .post("/admin/liqueurMethod_delete_img", {
                        file_link: this.input.oldimg
                    })
                    .then(function (response) {
                        //console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                this.input.newimg = event.target.files[0];
                const fd = new FormData();
                fd.append("file", this.input.newimg, this.input.newimg.name);
                axios
                    .post("/admin/liqueurMethod_upload_img", fd)
                    .then(response => (this.input.oldimg = response.data))
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        //清除表單資料
        clear() {
            (this.input.newimg = null),
                (this.input.oldimg = ""),
                (this.input.title = ""),
                (this.input.liqueur_id = ""),
                (this.input.sort = ""),
                (this.input.content = "");
            $("#img").val("");
            $('#warm').attr('hidden', 'hidden');
            $('#content').removeClass('border border-danger');
        },

        sweetalert(action) {
            if (action != "del") {
                Swal.fire({
                    icon: "success",
                    title: "儲存成功",
                    timer: 1500
                }).then(result => {
                    $("#add").click();
                });
            } else {
                Swal.fire({
                    icon: "success",
                    title: "刪除成功",
                    timer: 1500
                });
            }
        }
    }
};
</script>
