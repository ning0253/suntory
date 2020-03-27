<template>
    <div class="container">
        <a id="add" href="#create" data-toggle="collapse" class="btn btn-success" @click="clear()">新增</a>

        <hr />

        <div class="collapse" id="create">
            <div class="card card-body">
                <form method="post" action="#" enctype="multipart/form-data" id="form1" @submit.prevent="store(input.index)">
                    <div class="form-group">
                        <label for="liqueur_id">產品系列</label>
                        <select required name="liqueur_id" id v-model="input.id" class="form-control">
                            <option v-for="(item, index) in liqueur_kind" :value="item.id" :key="index">{{ item.name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="img">圖片</label>
                        <input v-if="this.input.oldimg == null" required type="file" class="form-control" @change="processFile($event)" id="img" name="img" value />
                        <input v-else type="file" class="form-control" @change="processFile($event)" id="img" name="img" value />
                        <div class="col-4 m-2">
                            <img :src="input.oldimg" alt srcset class="img-fluid" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title">態度的標題</label>
                        <input type="text" class="form-control" v-model="input.title" id="title" name="title" required />
                    </div>
                    <div class="form-group">
                        <label for="content">態度的內容</label>
                        <label for="content" id="warm" style="color: red;margin-left: 5px;" hidden="hidden">請輸入內容！</label>
                        <vue-editor class="" id="content" name="content" v-model="input.content" :editor-toolbar="customToolbar" @text-change="checkForInput" />
                    </div>
                    <div class="form-group" v-if="input.edit != null">
                        <label for="sort">權重</label>
                        <input type="number" class="form-control" v-model="input.sort" id="sort" name="sort" value="0" />
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
                    <th width="50">系列</th>
                    <th width="150">圖片</th>
                    <th>標題</th>
                    <th>內容</th>
                    <th width="35">權重</th>
                    <th width="80"></th>
                </tr>
            </thead>
            <tbody class="tbody">
                <tr v-for="(item, index) in liqueur_text" :key="index">
                    <td>{{ item.name.name }}</td>
                    <td style="display: flex; justify-content: center;">
                        <img :src="item.img" alt srcset style="max-width: 100%;max-height: 100;"/>
                    </td>
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
            .post("/admin/liqueurAttitude_kind")
            .then(response => (this.liqueur_kind = response.data))
            .catch(function (error) {
                console.log(error);
            });
        //獲取酒的態度
        axios
            .post("/admin/liqueurAttitude_text")
            .then(response => {
                this.liqueur_text = response.data;
                this.upload();
            })
            .catch(function (error) {
                console.log(error);
            });
    },
    data() {
        return {
            liqueur_text: [],
            liqueur_kind: [],
            input: {
                id: "", //liqueur id
                newimg: null,
                oldimg: null,
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

            if (this.input.edit == null) {
                axios
                    .post("/admin/liqueurAttitude", {
                        liqueur_id: this.input.id,
                        img: this.input.oldimg,
                        content: this.input.content,
                        title: this.input.title,
                        sort: 0
                    })
                    .then(res => {
                        this.sweetalert("add");
                        this.liqueur_text.push(res.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            } else {
                axios
                    .put(`/admin/liqueurAttitude/${this.input.edit}`, {
                        liqueur_id: this.input.id,
                        img: this.input.oldimg,
                        content: this.input.content,
                        title: this.input.title,
                        sort: this.input.sort
                    })
                    .then(res => {
                        this.sweetalert("edit");
                        //兩個方法都可以重新渲染
                        this.$set(this.liqueur_text, index, res.data);
                        // this.liqueur_text.splice(index,1, res.data)
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        //當頁面讀取完成後執行datatable
        upload() {
            $(document).ready(function () {
                $("#example").DataTable();
            });
        },
        //刪除
        deletedata(index) {
            let target = this.liqueur_text[index];

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
                        .delete("/admin/liqueurAttitude/" + target.id)
                        .then(res => {
                            this.liqueur_text.splice(index, 1);
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
            let target = this.liqueur_text[index];
            axios
                .get(`/admin/liqueurAttitude/${target.id}/edit`)
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
                    this.input.content = content;
                    this.input.title = title;
                    this.input.oldimg = img;
                    this.input.id = liqueur_id;
                    this.input.edit = id;
                    this.input.index = index;
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
                    .post("/admin/liqueurAttitude_upload_img", fd)
                    .then(response => (this.input.oldimg = response.data))
                    .catch(function (error) {
                        console.log(error);
                    });
            } else {
                axios
                    .post("/admin/liqueurAttitude_delete_img", {
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
                    .post("/admin/liqueurAttitude_upload_img", fd)
                    .then(response => (this.input.oldimg = response.data))
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        //清除表單資料
        clear() {
            (this.input.id = null),
                (this.input.newimg = null),
                (this.input.oldimg = null),
                (this.input.title = ""),
                (this.input.content = ""),
                (this.input.sort = 0),
                (this.input.edit = null),
                (this.input.index = null);
            $('#img').val('');
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
                    this.clear();
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
