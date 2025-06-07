@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <p>Selamat datang, Admin {{ Auth::user()->name }}</p>

    <!-- Tabel Data -->
    <table class="table table-bordered mt-4" id="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data akan muncul di sini -->
        </tbody>
    </table>

    <!-- Form Tambah / Edit -->
    <form id="data-form" class="mt-3">
        <input type="hidden" id="item-id" />
        <div class="mb-3">
            <input type="text" id="item-name" class="form-control" placeholder="Masukkan nama" required />
        </div>
        <button type="submit" class="btn btn-primary" id="submit-btn">Tambah</button>
        <button type="button" class="btn btn-secondary" id="cancel-btn" style="display:none;">Batal</button>
    </form>
</div>

<script>
    // Data dummy awal
    let items = [
        { id: 1, name: "Item 1" },
        { id: 2, name: "Item 2" },
        { id: 3, name: "Item 3" }
    ];

    const tableBody = document.querySelector("#data-table tbody");
    const form = document.getElementById("data-form");
    const inputId = document.getElementById("item-id");
    const inputName = document.getElementById("item-name");
    const submitBtn = document.getElementById("submit-btn");
    const cancelBtn = document.getElementById("cancel-btn");

    function renderTable() {
        tableBody.innerHTML = "";
        items.forEach(item => {
            const row = document.createElement("tr");

            row.innerHTML = `
                <td>${item.id}</td>
                <td>${item.name}</td>
                <td>
                    <button class="btn btn-sm btn-warning" onclick="editItem(${item.id})">Edit</button>
                    <button class="btn btn-sm btn-danger" onclick="deleteItem(${item.id})">Hapus</button>
                </td>
            `;

            tableBody.appendChild(row);
        });
    }

    function addItem(name) {
        const newId = items.length ? Math.max(...items.map(i => i.id)) + 1 : 1;
        items.push({ id: newId, name });
        renderTable();
    }

    function editItem(id) {
        const item = items.find(i => i.id === id);
        if (!item) return;

        inputId.value = item.id;
        inputName.value = item.name;
        submitBtn.textContent = "Update";
        cancelBtn.style.display = "inline-block";
    }

    function updateItem(id, name) {
        const item = items.find(i => i.id === id);
        if (item) {
            item.name = name;
            renderTable();
        }
    }

    function deleteItem(id) {
        if (confirm("Yakin ingin menghapus data ini?")) {
            items = items.filter(i => i.id !== id);
            renderTable();
            resetForm();
        }
    }

    function resetForm() {
        inputId.value = "";
        inputName.value = "";
        submitBtn.textContent = "Tambah";
        cancelBtn.style.display = "none";
    }

    form.addEventListener("submit", (e) => {
        e.preventDefault();
        const id = parseInt(inputId.value);
        const name = inputName.value.trim();

        if (name === "") {
            alert("Nama tidak boleh kosong");
            return;
        }

        if (id) {
            updateItem(id, name);
        } else {
            addItem(name);
        }

        resetForm();
    });

    cancelBtn.addEventListener("click", () => {
        resetForm();
    });

    // Render data awal
    renderTable();
</script>
@endsection
