import mysql.connector as db_mysql
import hashlib

class xampp:
    def __init__(self, host_xampp, user, passwd, nama_db):
        self.host = host_xampp
        self.user = user
        self.passwd = passwd
        self.nama_db = nama_db
    
    def initialize(self):
        # koneksikan ke xampp phpmyadmin
        db = db_mysql.connect(
            host=self.host,
            user=self.user,
            passwd=self.passwd
        )

        # membuat kursor db
        c = db.cursor()

        # membuat database baru jika database tidak tersedia
        c.execute(f"CREATE DATABASE IF NOT EXISTS {self.nama_db}")

        # commit
        db.commit()

        # tutup koneksi ke xampp
        db.close()

    def create_table(self):
        # koneksikan ke xampp phpmyadmin
        db = db_mysql.connect(
            host=self.host,
            user=self.user,
            passwd=self.passwd,
            database=self.nama_db
        )

        # membuat kursor db
        c=db.cursor()

        # buat table alat
        tb_alat = """CREATE TABLE IF NOT EXISTS tb_alat(
            kode VARCHAR(50) PRIMARY KEY,
            nama VARCHAR(50),
            vendor VARCHAR(50),
            jenis VARCHAR(30),
            keterangan VARCHAR(11),
            berakhir DATE,
            baru DATE
        )
        """

        c.execute(tb_alat)

        # commit
        db.commit()

        # tutupp database 
        db.close()

    def input_new_account(self, id_nama, id_user, id_pass):
        self.id_nama = id_nama
        self.id_pass = id_pass
        self.id_user = id_user

        # koneksikan ke xampp phpmyadmin
        db = db_mysql.connect(
            host=self.host,
            user=self.user,
            passwd=self.passwd,
            database=self.nama_db
        )

        # membuat kursor db
        c=db.cursor()

        # buat table admin
        tb_admin = """CREATE TABLE IF NOT EXISTS tb_admin(
            id_admin INT AUTO_INCREMENT PRIMARY KEY,
            nama_admin VARCHAR(50),
            username VARCHAR (50) UNIQUE,
            password VARCHAR(100)
        )
        """

        # jalankan perintah membuat tabel baru jika tidak ada
        c.execute(tb_admin)

        # convert password akun ke skript md5 agar tidak terlihat di db
        bytepass = bytes(self.id_pass, 'utf-8')
        hexpass = hashlib.md5(bytepass).hexdigest()

        # input data ke tabel
        sql_admin = "INSERT INTO tb_admin (nama_admin, username, password) VALUES (%s, %s, %s)"
        val_admin = (self.id_nama, self.id_user, hexpass)

        # execute
        c.execute(sql_admin, val_admin)

        # done
        print(f"{c.rowcount} data ditambah")
        
        # commit
        db.commit()
        # close
        db.close()
