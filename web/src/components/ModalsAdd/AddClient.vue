<template>
    <q-card style="min-width: 350px">
        <q-card-section>
          <div class="text-h6">Criar cliente</div>
        </q-card-section>
      <form @submit="handleSubmit">
        <q-card-section class="q-pt-none">
          <div class="row q-mb-sm">
            <q-input class="col" outlined v-model="clientSubmit.name" label="Nome" :rules="[val => !!val || 'Field is required']" />
          </div>
          <div class="row q-mb-sm">
            <q-input class="col" type="email" outlined v-model="clientSubmit.email" label="E-mail" :rules="[val => !!val || 'Field is required']"  />
          </div>
          <div class="row q-mb-sm">
            <q-input class="col" outlined v-model="clientSubmit.address" label="Endereco" :rules="[val => !!val || 'Field is required']" />
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
      clientSubmit: {
        name: '',
        email: '',
        address: ''
      }
    }
  },
  methods: {
    isValidEmail () {
      const emailPattern = /^(?=[a-zA-Z0-9@._%+-]{6,254}$)[a-zA-Z0-9._%+-]{1,64}@(?:[a-zA-Z0-9-]{1,63}\.){1,8}[a-zA-Z]{2,63}$/;
      return emailPattern.test(this.clientSubmit.email) || 'Invalid email';
    },
    async handleSubmit(){
      const client =  this.clientSubmit
      const response = await this.$axios.post('/clients/add', client)
    }
  }
}
</script>
