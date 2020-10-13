<template>
  <div class="q-pa-md">
    <q-btn label="Adicionar" color="primary" @click="prompt = true" />
    <q-markup-table>
      <thead>
        <tr>
          <th class="text-left">Nome</th>
          <th class="text-left">E-mail</th>
          <th class="text-left">Endereco</th>
          <th class="text-right">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="(client, index) in clients"
          :key="index"
        >
          <td class="text-left">{{ client.name }}</td>
          <td class="text-left">{{ client.email }}</td>
          <td class="text-left">{{ client.address }}</td>
          <td class="text-right">
            <q-btn color="negative" @click="handleDelete(client.id)" flat label="Deletar"/>
            <q-btn color="primary" flat label="Editar" :to="{ name: 'editClient', params: { id: client.id }}"/>
          </td>
        </tr>
      </tbody>
    </q-markup-table>
    <q-dialog v-model="prompt">
      <add-client />
    </q-dialog>
  </div>
</template>

<script>
export default {
  name: 'Clients',
  async created() {
    const response = await this.$axios.get('/clients')
    this.clients = response.data
  },
  data() {
    return {
      clients: this.clients,
      prompt: false,
      editModal: false,
    }
  },
  methods: {
    async handleDelete(id) {
      try{
        await this.$axios.delete(`clients/delete/${id}`)
        this.clients = this.clients.filter(client => client.id !== id)
      }catch(err){
        console.log(err)
      }
    },
    handleButtonEdit(){
      return '/clients/edit/1'
    }
  },
  components: {
    'add-client': require('components/ModalsAdd/AddClient.vue').default,
  }
}
</script>
