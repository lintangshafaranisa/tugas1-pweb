document.addEventListener("DOMContentLoaded", () => {

  const modal = document.getElementById("modal");
  const btnTambah = document.getElementById("btnTambah");
  const close = document.querySelector(".close");
  const judulModal = document.getElementById("judulModal");

let layanan = JSON.parse(localStorage.getItem("layanan"));

if (!layanan || layanan.length === 0) {
  layanan = [
    { kode: "A001", nama: "Potong Rambut", harga: 50000 },
    { kode: "A002", nama: "Cat Rambut", harga: 150000 },
    { kode: "A003", nama: "Hair Spa", harga: 100000 },
    { kode: "A004", nama: "Spa Badan", harga: 250000 },
    { kode: "A005", nama: "Pedicure & Manicure", harga: 300000 },
    { kode: "A006", nama: "Facial Wajah", harga: 200000 },
    { kode: "A007", nama: "Creambath", harga: 140000 }
  ];

  localStorage.setItem("layanan", JSON.stringify(layanan));
}
  // ================= MODAL =================
  if (btnTambah) {
    btnTambah.onclick = () => {
    modal.style.display = "flex";
    form.reset();
    editIndex = -1;
    judulModal.innerText = "Tambah Layanan";
};
  }

  if (close) {
    close.onclick = () => modal.style.display = "none";
  }

  window.onclick = (e) => {
    if (e.target === modal) modal.style.display = "none";
  };

  // ================= RENDER =================
  const render = (data = layanan) => {
    const tbody = document.getElementById("tbodyLayanan");
    if (!tbody) return;

    tbody.innerHTML = "";

    data.forEach((item, i) => {
      tbody.innerHTML += `
        <tr>
          <td>${item.kode}</td>
          <td>${item.nama}</td>
          <td>Rp. ${Number(item.harga).toLocaleString()}</td>
          <td>
            <button class="btn-edit" onclick="edit(${i})">Edit</button>
            <button class="btn-hapus" onclick="hapus(${i})">Hapus</button>
          </td>
        </tr>
      `;
    });

    localStorage.setItem("layanan", JSON.stringify(layanan));

    loadStatistik(); 
  };

  // ================= EDIT =================
    window.edit = (i) => {
    const data = layanan[i];

    kode.value = data.kode;
    nama.value = data.nama;
    harga.value = data.harga;

    editIndex = i;
    judulModal.innerText = "Edit Layanan";

    modal.style.display = "flex";
    };

  // ================= HAPUS =================
  window.hapus = (i) => {
    if (confirm("Yakin ingin menghapus data ini?")) {
      layanan.splice(i, 1);
      render();
    }
  };

  // ================= SUBMIT =================
  const form = document.getElementById("formLayanan");

  if (form) {
    form.addEventListener("submit", (e) => {
      e.preventDefault();

      const kode = document.getElementById("kode").value;
      const nama = document.getElementById("nama").value;
      const harga = document.getElementById("harga").value;

      if (!kode || !nama || !harga) {
        alert("Semua harus diisi!");
        return;
      }

      const data = { kode, nama, harga };

      if (editIndex === -1) {
        layanan.push(data);
      } else {
        layanan[editIndex] = data;
        editIndex = -1;
      }

      render();

      if (modal) modal.style.display = "none";
      e.target.reset();
    });
  }

  // ================= PENCARIAN REAL TIME =================
  const search = document.getElementById("search");

  if (search) {
    search.addEventListener("input", (e) => {
      const keyword = e.target.value.toLowerCase();

      const hasil = layanan.filter(item =>
        item.kode.toLowerCase().includes(keyword) ||
        item.nama.toLowerCase().includes(keyword)
      );

      render(hasil);
    });
  }

  // ================= STATISTIK =================
  const loadStatistik = () => {
    const data = JSON.parse(localStorage.getItem("layanan")) || [];

    const el = document.getElementById("totalLayanan");
    if (el) {
      el.innerText = data.length;
    }
  };

  // ================= INI DIA =================
  loadStatistik();

  if (document.getElementById("tbodyLayanan")) {
    render();
  }

});