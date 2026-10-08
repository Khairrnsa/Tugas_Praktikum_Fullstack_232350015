@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1 class="display-6 text-primary">Daftar Menu</h1>
    <a href="./add_menu" class="btn btn-sm btn-primary">Tambah Menu</a>
</div>
<hr>

<div v-if="sedangMemuat" class="alert alert-info">Memuat data...</div>
<div v-else-if="pesanEror" class="alert alert-danger">@{{ pesanEror }}</div>
<div v-else-if="daftarMenu.length === 0" class="alert alert-warning">
    Belum ada data menu.
</div>

<table v-else class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Kode</th>
            <th>Nama</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="menu in daftarMenu" :key="menu.id">
            <td>@{{ menu.id }}</td>
            <td>@{{ menu.kode }}</td>
            <td>@{{ menu.nama }}</td>
        </tr>
    </tbody>
</table>
@endsection

@section('scripts')
<script src="{{ asset('vendor/vuejs/vue.global.js') }}"></script>
<script>
const { createApp, ref, onMounted } = Vue;

createApp({
    setup() {
        const daftarMenu = ref([]);
        const sedangMemuat = ref(true);
        const pesanEror = ref(null);

        function ambilDataMenu() {
            fetch('/api/data_menu')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Gagal mengambil data menu');
                    }
                    return response.json();
                })
                .then(data => {
                    daftarMenu.value = data;
                    sedangMemuat.value = false;
                })
                .catch(error => {
                    pesanEror.value = error.message;
                    sedangMemuat.value = false;
                });
        }

        onMounted(() => ambilDataMenu());

        return { daftarMenu, sedangMemuat, pesanEror };
    }
}).mount('#app');
</script>
@endsection
