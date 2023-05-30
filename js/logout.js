function logoutadmin_petugas() {
    let logout = confirm('Anda yakin ingin logout?');
    if (logout) {
        window.location = '../Logout/logout_admin_petugas.php';
    }
}

function logoutSiswa() {
    let logout = confirm('Anda yakin ingin logout?');
    if (logout) {
        window.location = '../Logout/logout_siswa.php';
    }
}