<template>
  <div>
      <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <label>Tên sản phẩm</label>
                <vs-input
                  type="text"
                  size="default"
                  placeholder="Tên sản phẩm"
                  class="w-100"
                   v-model="objData.name[0].content"
                />
                <el-button size="small" @click="showSettingLangExist('name')">Đa ngôn ngữ</el-button>
                <div class="dropLanguage" v-if="showLang.title == true">
                  <div class="form-group" v-for="item,index in lang" :key="index">
                    <label v-if="index != 0">{{item.name}}</label>
                    <input
                      v-if="index != 0"
                      type="text"
                      size="default"
                      placeholder="Tên sản phẩm"
                      class="w-100 inputlang"
                      v-model="objData.name[index].content"
                    />
                  </div>
                </div>
              </div> 
              <div class="form-group">
                <label>Nội dung</label>
                <TinyMce
                  v-model="objData.content[0].content"
                />
                <el-button size="small" @click="showSettingLangExist('content')">Đa ngôn ngữ</el-button>
                 <div class="dropLanguage" v-if="showLang.content == true">
                    <div class="form-group" v-for="item,index in lang" :key="index">
                        <label v-if="index != 0">{{item.name}}</label>
                        <TinyMce v-if="index != 0" v-model="objData.content[index].content" />
                        
                    </div>
                </div>
              </div>
              <div class="form-group">
                <label>Mô tả ngắn</label>
                <TinyMce
                  v-model="objData.description[0].content"
                />
                <el-button size="small" @click="showSettingLangExist('description')">Đa ngôn ngữ</el-button>
                 <div class="dropLanguage" v-if="showLang.description == true">
                    <div class="form-group" v-for="item,index in lang" :key="index">
                        <label v-if="index != 0">{{item.name}}</label>
                        <TinyMce v-if="index != 0" v-model="objData.description[index].content" />
                    </div>
                </div>
              </div>
              <div class="form-group">
                <label>Ảnh sản phẩm</label>
                <ImageMulti v-model="objData.images" :title="'san-pham'"/>
              </div>
              <div class="form-group">
                <label>Giá Sản phẩm</label>
                <vs-input
                  type="number"
                  size="default"
                  icon="all_inclusive"
                  class="w-100"
                  v-model="objData.price"
                />
              </div>
              <div class="form-group">
                <label>Giá Giảm</label>
                <vs-input
                  type="number"
                  size="default"
                  icon="all_inclusive"
                  class="w-100"
                  v-model="objData.discount"
                />
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <label>Trạng thái</label>
                <vs-select v-model="objData.status"
                  >
                  <vs-select-item  value="1" text="Hiển thị" />
                  <vs-select-item  value="0" text="Ẩn" />
                </vs-select>
              </div>
              <div class="form-group">
                <label>Hiển thị trang chủ</label>
                <vs-select v-model="objData.discountStatus">
                  <vs-select-item value="1" text="Có" />
                  <vs-select-item value="0" text="Không" />
                </vs-select>
              </div>
              <div class="form-group">
                <label>Danh mục</label>
                
                <vs-select class="selectExample" v-model="objData.category" placeholder="Danh mục" @change="findCategoryType()">
                  <vs-select-item
                    value="0"
                    text="Không danh mục"
                  />
                  <vs-select-item
                    :value="item.id"
                    :text="JSON.parse(item.name)[0].content"
                    v-for="(item,index) in cate"
                    :key="'f'+index"
                  />
                </vs-select>
              </div>
              <!-- <div class="form-group">
                <label>Loại</label>
                <vs-select
                  class="selectExample"
                  v-model="objData.type_cate"
                  placeholder="Loại danh mục"
                  :disabled="objData.category == 0 || type_cate.length == 0"
                  @change="findCategoryTypeTwo()"
                >
                  <vs-select-item
                    :value="item.id"
                    :text="JSON.parse(item.name)[0].content"
                    v-for="(item, index) in type_cate"
                    :key="'v' + index"
                  />
                </vs-select>
              </div> -->
              <div class="form-group">
                <label>Thông tin kỹ thuật</label>
                <div v-for="(item, index) in objData.size" :key="index">
                  <div class="row">
                    <div class="col-11">
                      <vs-input
                        type="text"
                        size="default"
                        :placeholder="'Tiêu đề ' + index"
                        class="w-100"
                        v-model="objData.size[index].title"
                      />
                      <vs-input
                        type="text"
                        size="default"
                        :placeholder="'Chi tiết ' + index"
                        class="w-100"
                        v-model="objData.size[index].detail"
                      />
                      <br />
                    </div>
                    <div class="col-1">
                      <a
                        href="javascript:;"
                        v-if="index != 0"
                        @click="remoteAr(index,'size')"
                      >
                        <img v-bind:src="'/media/' + joke.avatar" width="25" />
                      </a>
                    </div>
                  </div>
                </div>

                <el-button size="small" @click="addInput('size')"
                  >Thêm thông số</el-button
                >
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row fixxed">
        <div class="col-12">
          <div class="saveButton">
            <vs-button color="primary" @click="saveProducts">Cập nhật</vs-button>
          </div>
        </div>
      </div>
    <!-- content-wrapper ends -->
  </div>
</template>


<script>
import { mapActions } from "vuex";
import TinyMce from "../_common/tinymce";
import ImageMulti from "../_common/upload_image_multi";
// import InputTag from 'vue-input-tag'
export default {
  name: "product",
  data() {
    return {
      showLang:{
        title:false,
        content:false,
        description:false
      },
      joke: {
        avatar: "delete-sign--v2.png",
      },
      errors:[],
      cate: [],
      cateservice:[],
      objData: {
        id:0,
        name: [
          {
            lang_code:'vi',
            content:''
          }
        ],
        size: [
          {
            title: "",
            detail: ""
          },
        ],
        price: 0,
        discount: 0,
        preserve:[
          {
            detail: ""
        }
        ],
        ingredient:'',
        images: [],
        qty: "",
        description:[
          {
            lang_code:'vi',
            content:''
          }
        ],
        content: [
          {
            lang_code:'vi',
            content:''
          }
        ],
        category: 0,
        status: 1,
        discountStatus:0,
        type_cate: 0,
        type_two:0,
        species: "",
        origin: "",
        thickness: "",
        hang_muc: "",
        service_id:0
      },
      lang:[],
      type_cate: [],
      type_two:[]
    };
  },
  components: {
    TinyMce,
    ImageMulti
  },
  computed: {},
  watch: {
  },
  methods: {
    ...mapActions(["editId", "saveProduct", "listCate","listLanguage", "loadings","findTypeCate","findTypeCateTwo","listCateService"]),
    showSettingLang(value){
      if(value == "title"){
        this.showLang.title = !this.showLang.title
      }
      
    },
    showSettingLangExist(value,name = "content"){
      if(value == "content"){
        this.showLang.content = !this.showLang.content
          this.lang.forEach((value, index) => {
              if(!this.objData.content[index]){
                  var oj = {};
                  oj.lang_code = value.code;
                  oj.content = ''
                  this.objData.content.push(oj)
              }
          });
      }
      if(value == "description"){
        this.showLang.description = !this.showLang.description
          this.lang.forEach((value, index) => {
              if(!this.objData.description[index]){
                  var oj = {};
                  oj.lang_code = value.code;
                  oj.content = ''
                  this.objData.description.push(oj)
              }
          });

      }
      if(value == "name"){
        this.showLang.title = !this.showLang.title
          this.lang.forEach((value, index) => {
              if( !this.objData.name[index]){
                  var oj = {};
                  oj.lang_code = value.code;
                  oj.content = ''
                  this.objData.name.push(oj)
              }
          });
      }
      
    },
    saveProducts() {
      this.errors = [];
      if(this.objData.name[0].content == '') this.errors.push('Tên không được để trống');
      if(this.objData.content[0].content == '') this.errors.push('Nội dung không được để trống');
      if(this.objData.description[0].content == '') this.errors.push('Mô tả không được để trống');
      if(this.objData.images.length == 0) this.errors.push('Vui lòng chọn ảnh');
      if(this.objData.category == 0) this.errors.push('Chọn danh mục sản phẩm');
      if(this.objData.service_id == null) this.errors.push('Chọn danh mục dịch vụ');
      if (this.errors.length > 0) {
        this.errors.forEach((value, key) => {
          this.$error(value)
        })
        return;
      }else {
        this.loadings(true);
        
        this.saveProduct(this.objData)
          .then(response => {
            this.loadings(false);
            this.$router.push({name:'listProduct'});
            this.$success('Sửa sản phẩm thành công');
            // this.$route.push({name:'listProduct'});
          })
          .catch(error => {
            this.loadings(false);
            this.$error('Sửa sản phẩm thất bại');
          });
      }
    },
    editById() {
      this.loadings(true);
      this.editId({id:this.$route.params.id}).then(response => {
        this.loadings(false);
          this.objData = response.data;
          this.objData.images = JSON.parse(response.data.images);
          this.objData.content = JSON.parse(response.data.content);
          this.objData.description = JSON.parse(response.data.description);
          this.objData.name = JSON.parse(response.data.name);
          if(response.data.size == ""){
            this.objData.size = [{title: "",detail: ""}]
          }else{
            this.objData.size = JSON.parse(response.data.size);
          }
          if(response.data.preserve == null){
            this.objData.preserve = [{detail: ""}]
          }else{
            this.objData.preserve = JSON.parse(response.data.preserve);
          }
      }).catch(error => {
        console.log(12);
      });
    },
    listLang(){
      this.listLanguage().then(response => {
        this.loadings(false);
        this.lang  = response.data
      }).catch(error => {

      })
    },
    changeLanguage(data){
      this.editById();
    },
    findCategoryType(){
      this.findTypeCate(this.objData.category).then(response => {
          this.type_cate = response.data;
        });
        
    },
    remoteAr(index,key) {
      if(key == 'size'){
        this.objData.size.splice(index, 1);
      }
      if(key == 'preserve'){
        this.objData.preserve.splice(index, 1);
      }
        
    },
    addInput(key) {
        var oj = {};
        if(key =='size'){
          oj.title = "";
          oj.detail = "";
          this.objData.size.push(oj);
        }
        if(key =='preserve'){
          oj.detail = "";
          this.objData.preserve.push(oj);
        }
        
    },
    findCategoryTypeTwo() {
      this.findTypeCateTwo(this.objData.type_cate).then((response) => {
        this.type_two = response.data;
        if(this.type_two.length == 0){
          this.objData.type_two == 0;
        }
      });
    }
  },
  mounted() {
    this.editById();
     this.listCateService().then((response) => {
      this.loadings(false);
      this.cateservice = response.data;
    });
    this.listCate().then(response => {
      this.cate = response.data;
    });
    this.listLang();
  }
};
</script>
<style>
  .dropLanguage{
        padding: 11px;
        border: solid 1px #f2edf3;
        border-radius: 11px;
        background: #f2edf3;
        margin-top: 5px
  }
</style>