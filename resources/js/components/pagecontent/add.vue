<template>

  <div>
      <h3 class="page-title">Thêm mới trang nội dung</h3>
      <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <label>Tên trang nội dung</label>
                <vs-input
                  type="text"
                  size="default"
                  placeholder="Tên bài viết"
                  class="w-100"
                  v-model="objData.title"
                  :class="{ 'is-invalid': submitted && $v.objData.title.$error }"
                />
                <div v-if="submitted && !$v.objData.title.required" class="noti-err">Title không để trống</div>
              </div>
              <div class="form-group">
                <label>Nội dung</label>
                <TinyMce v-model="objData.content" :class="{ 'is-invalid': submitted && $v.objData.content.$error }" />
                <div v-if="submitted && !$v.objData.content.required" class="noti-err">Nội dung không để trống</div>
              </div>
              <div class="form-group">
                <label>Mô tả ngắn</label>
                <TinyMce v-model="objData.description" :class="{ 'is-invalid': submitted && $v.objData.description.$error }" />
                <div v-if="submitted && !$v.objData.description.required" class="noti-err">Nội dung không để trống</div>
              </div>
              <div class="form-group">
                <label>Ảnh đại diện</label>
                <ImageMulti v-model="objData.image" :title="'trang-noi-dung-'"/> 
              </div>
              <vs-button color="primary" @click="addPagecontent">Thêm mới</vs-button>
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
                      <vs-select-item  value="1" text="Hiện" />
                      <vs-select-item  value="0" text="Ẩn" />
                    </vs-select>
              </div>
              <div class="form-group">
                <label>Danh mục</label>
                <vs-select v-model="objData.type"
                  >
                      <vs-select-item  value="ve-chung-toi" text="Về Chúng Tôi" />  
                      <vs-select-item  value="ho-tro-khanh-hang" text="Hỗ trợ khách hàng" />   
                    </vs-select>
              </div>
              <!-- <div class="form-group">
                <label>Danh muc</label>
                <vs-select class="selectExample" v-model="objData.category" placeholder="Danh mục">
                  <vs-select-item
                    :value="item.id"
                    :text="item.name"
                    v-for="(item,index) in cate"
                    :key="'f'+index"
                  />
                </vs-select>
                <div v-if="submitted && !$v.objData.category.required" class="noti-err">Chọn tối thiểu 1 ảnh</div>
              </div> -->
              
            </div>
          </div>
        </div>
        
      </div>
    <!-- content-wrapper ends -->
  </div>
</template>


<script>
import { mapActions } from "vuex";
import TinyMce from "../_common/tinymce";
import { required } from "vuelidate/lib/validators";
import ImageMulti from "../_common/upload_image_multi";
export default {
  name: "product",
  data() {
    return {
      submitted: false,
      cate:[],
      objData: {
        title: "",
        content: "",
        description: "",
        status: 1,
        image:"",
        type:'ve-chung-toi'
      }
    };
  },
  validations: {
    objData: {
      title: { required },
      description: { required },
      content: { required },
    }
  },
  components: {
    TinyMce,ImageMulti
  },
  computed: {},
  watch: {},
  methods: {
    ...mapActions(["savePageContent", "loadings"]),
    addPagecontent(){
      this.submitted = true;
      this.$v.$touch();
      if (this.$v.$invalid) {
        return;
      }else{
        this.loadings(true);
        this.savePageContent(this.objData).then(response => {
          this.loadings(false);
          this.$router.push({name:'pageContent'});
          this.$success('Thêm trang nội dung thành công');
        }).catch(error => {
          this.loadings(false);
          this.$error('Thêm trang nội dung thất bại');
        })
      }
    }
  },
  mounted() {
 
  }
};
</script>