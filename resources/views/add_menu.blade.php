@extends('layouts.app')

@section('content')
<h1 class="display-6 text-primary">Tambah Menu</h1>
<a href="/menu" class="btn btn-sm btn-outline-secondary mb-3">Kembali</a>

<div v-if="notifikasi" class="alert alert-success">
    @{{ notifikasi }}
</div>

<form @submit.prevent="submitForm">
    <div class="mb-3">
        <label class="form-label">Kode</label>
        <input type="text" class="form-control"
               v-model.trim="form.kode" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" class="form-control"
               v-model.trim="form.nama" required>
    </div>

    <button class="btn btn-primary" type="submit" :disabled="sedangKirim">
        Simpan Menu
    </button>
</form>
@endsection

@section('scripts')
<script src="{{ asset('vendor/vuejs/vue.global.js') }}"></script>
<script>
const { createApp, ref } = Vue;

createApp({
    setup() {
        const sedangKirim = ref(false);
        const notifikasi = ref(null);
        const form = ref({ kode: '', nama: '' });

        function submitForm() {
            sedangKirim.value = true;
            notifikasi.value = null;

            fetch('/api/create_menu', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(form.value)
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Gagal menyimpan menu');
                }
                return response.json();
            })
            .then(response => {
                if (response.status === 'success') {
                    notifikasi.value = 'Menu berhasil disimpan!';
                    form.value = { kode: '', nama: '' };
                }
                sedangKirim.value = false;
            })
            .catch(error => {
                alert(error.message);
                sedangKirim.value = false;
            });
        }

        return { form, sedangKirim, notifikasi, submitForm };
    }
}).mount('#app');
</script>
@endsection
