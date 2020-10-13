<template>
  <div class="q-pa-md">
    <q-btn label="Adicionar" color="primary" @click="prompt = true" />
    <q-markup-table>
      <thead>
        <tr>
          <th class="text-left">Codigo</th>
          <th class="text-left">Nome</th>
          <th class="text-left">Descricao</th>
          <th class="text-left">Preco</th>
          <th class="text-right">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="(product, index) in products"
          :key="index"
        >
          <td class="text-left">{{ product.code }}</td>
          <td class="text-left">{{ product.name }}</td>
          <td class="text-left">{{ product.description }}</td>
          <td class="text-left">{{ product.price }}</td>
          <td class="text-right">
            <q-btn color="negative" @click="handleDelete(product.id)" flat label="Deletar"/>
            <q-btn color="primary" flat label="Editar" :to="{ name: 'editProduct', params: { id: product.id }}"/>
          </td>
        </tr>
      </tbody>
    </q-markup-table>
    <q-dialog v-model="prompt">
      <add-product />
    </q-dialog>
  </div>
</template>

<script>
export default {
  name: 'Products',
  async created() {
    const response = await this.$axios.get('/products')
    console.log(response.data)
    this.products = response.data
  },
  data() {
    return {
      products: this.products,
      prompt: false,
      editModal: false,
    }
  },
  methods: {
    async handleDelete(id) {
      try{
        await this.$axios.delete(`products/delete/${id}`)
        this.products = this.products.filter(product => product.id !== id)
      }catch(err){
        console.log(err)
      }
    },
  },
  components: {
    'add-product': require('components/ModalsAdd/AddProduct.vue').default,
  }
}
</script>
