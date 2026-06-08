# UAS ADM - Deploy Static Web dan Dynamic Web

Project ini berisi dua aplikasi untuk kebutuhan UAS Administrasi Server:

- `static-web`: web static portfolio/CV.
- `dynamic-app`: aplikasi web dynamic PHP dengan database MariaDB.
- `database`: inisialisasi schema dan data awal MySQL.
- `nginx`: reverse proxy untuk static dan dynamic app.
- `.github/workflows`: workflow CI/CD untuk build, push image Docker, dan deploy ke EC2.

## Struktur

```text
uas-adm/
├── static-web/
├── dynamic-app/
├── database/
├── nginx/
├── .github/workflows/
├── docker-compose.yml
├── .env.example
└── README.md
```

## Menjalankan Lokal / EC2

```bash
cp .env.example .env
docker compose config
docker compose up -d --build
```

Akses:

- Static web: `http://localhost/`
- Dynamic app: `http://localhost/dynamic/`

Routing ini diatur lewat `nginx/default.conf`. Service `static-web` menjadi halaman utama, sedangkan service `dynamic-app` dipasang di path `/dynamic/`.

Default login admin dynamic app:

- Username: `admin`
- Password: `admin123`
