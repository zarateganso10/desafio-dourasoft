<template>
  <div class="q-pa-md">
    <form @submit.prevent="handleSubmitForm">
      <div class="q-gutter-md" style="max-width: 350px">
        <div class="row q-mb-sm">
          <q-input class="col" outlined v-model="client.name"  label="Nome" :rules="[val => !!val || 'Field is required']" />
        </div>
        <div class="row q-mb-sm">
          <q-input class="col" type="email" v-model="client.email" outlined  label="E-mail" :rules="[val => !!val || 'Field is required']"  />
        </div>
        <div class="row q-mb-sm">
          <q-input class="col" outlined v-model="client.address" label="Endereco" :rules="[val => !!val || 'Field is required']" />
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
      const response =  await this.$axios.get(`/clients/view/${id}`)
      this.client = response.data
    }catch(err){
      console.log(err)
    }
  },
  data() {
    return {
      client: this.client
    }
  },
  methods: {
    async handleSubmitForm() {
      const id = this.$route.params.id
      await this.$axios.put(`/clients/edit/${id}`, this.client)
      this.$router.push({ name: 'Clients'})
    }
  }

}
</script>
