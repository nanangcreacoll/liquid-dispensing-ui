# User Interface IoT Liquid Dispensing Kapsul Radifarmaka I-131

User Interface ini dibuat sebagai tampilan kendali untuk mengendalikan proses dispensing I-131 ke dalam kapsul.

## Registrasi User

Registrasi user menggunakan API.

- Request URL (`POST`): `/api/register`
    
- Request body: 
```json
    {
        "username": "username",
        "password": "password"
    }
```

## Tampilan

User interface ini akan mengirimkan parameter dispensing dengan volume maksimal 50 dan jumlah kapsul maksimal 5.

**Kendali**
![img.jpeg](kendali_view.jpeg)

**Riwayat**
![img.jpeg](riwayat_view.jpeg)