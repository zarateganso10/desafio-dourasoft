<template>
  <div class="q-pa-md">
    <form @submit.prevent="handleSubmitForm">
      <div class="q-gutter-md" style="max-width: 350px">
      <div class="row q-mb-sm">
          <q-input class="col" outlined v-model="product.code"  label="Code" :rules="[val => !!val || 'Field is required']" />
        </div>
        <div class="row q-mb-sm">
          <q-input class="col" outlined v-model="product.name"  label="Nome" :rules="[val => !!val || 'Field is required']" />
        </div>
        <div class="row q-mb-sm">
          <q-input class="col"  v-model="product.description" outlined  label="Descricao" :rules="[val => !!val || 'Field is required']"  />
        </div>
        <div class="row q-mb-sm">
          <q-input class="col" outlined v-model="product.price" label="Preco" :rules="[val => !!val || 'Field is required']" />
        </div>
        <div class="row q-mb-sm">
          <q-btn type="submit" color="primary" flat label="Editar"/>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  async created(){
    try{
      const id = this.$route.params.id
      const response =  await this.$axios.get(`/products/view/${id}`)
      this.product = response.data
    }catch(err){
      console.log(err)
    }
  },
  data() {
    return {
      product: this.product
    }
  },
  methods: {
    async handleSubmitForm() {
      const id = this.$route.params.id
      await this.$axios.put(`/products/edit/${id}`, this.product)
      this.$router.push({ name: 'Products'})
    }
  }

}
</script>
