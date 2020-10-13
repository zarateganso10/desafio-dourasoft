<template>
    <q-card style="min-width: 350px">
        <q-card-section>
          <div class="text-h6">Criar cliente</div>
        </q-card-section>
      <form @submit="handleSubmit">
        <q-card-section class="q-pt-none">
          <div class="row q-mb-sm">
            <q-input class="col" outlined v-model="productSubmit.code" label="Codigo" :rules="[val => !!val || 'Field is required']" />
          </div>
          <div class="row q-mb-sm">
            <q-input class="col" outlined v-model="productSubmit.name" label="Nome" :rules="[val => !!val || 'Field is required']" />
          </div>
          <div class="row q-mb-sm">
            <q-input class="col" outlined v-model="productSubmit.description" label="Descricao" :rules="[val => !!val || 'Field is required']"  />
          </div>
          <div class="row q-mb-sm">
            <q-input class="col" outlined v-model="productSubmit.price" label="Preco" :rules="[val => !!val || 'Field is required']" />
          </div>
        </q-card-section>

        <q-card-actions align="right" class="text-primary">
          <q-btn flat label="Cancelar" v-close-popup />
          <q-btn type="submit" flat label="Criar" v-close-popup />
        </q-card-actions>
      </form>
    </q-card>
</template>

<script>
export default {
  data () {
    return {
      productSubmit: {
        code: '',
        name: '',
        description: '',
        price: '',
      }
    }
  },
  methods: {
    async handleSubmit(){
      const product =  {
        ...this.productSubmit,
        price: Number(this.productSubmit.price)
      }
      const response = await this.$axios.post('/products/add', product)
    }
  }
}
</script>
