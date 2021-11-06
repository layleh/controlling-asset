import mysql.connector as db_mysql
from tkinter import *
from tkinter import messagebox
import hashlib

def database():
    try:
        host_db = id_local.get()
        user_db = id_usr.get()
        passwd_db = id_passwd.get()
        nama_db = 'db_alat'

        nama_admin = id_name.get()
        username = id_user.get()
        password = id_pass.get()

        # koneksi ke database
        db = db_mysql.connect(
            host=host_db,
            user=user_db,
            passwd=passwd_db
        )
        c = db.cursor()

        c.execute(f"CREATE DATABASE IF NOT EXISTS {nama_db}")

        db.close()

        db1 = db_mysql.connect(
            host=host_db,
            user=user_db,
            passwd=passwd_db,
            database=nama_db
        )
        c1 = db1.cursor() # buat kursor

        # buat table alat
        tb_alat = """CREATE TABLE IF NOT EXISTS tb_alat(
            kode VARCHAR(50) PRIMARY KEY,
            alat VARCHAR(50),
            jenis VARCHAR(30),
            berakhir DATE,
            baru DATE
        )
        """

        # buat table admin
        tb_admin = """CREATE TABLE IF NOT EXISTS tb_admin(
            id_admin INT AUTO_INCREMENT PRIMARY KEY,
            nama_admin VARCHAR(50),
            username VARCHAR (50) UNIQUE,
            password VARCHAR(100)
        )
        """

        # execute
        c1.execute(tb_alat)
        c1.execute(tb_admin)

        bytepass = bytes(password, 'utf-8')
        hexpass = hashlib.md5(bytepass).hexdigest()

        # Input data ke database
        sql_adm = "INSERT INTO tb_admin (nama_admin, username, password) VALUES (%s, %s, %s)"
        val_adm = (nama_admin, username, hexpass)

        # Execute data
        c1.execute(sql_adm, val_adm)

        # commit
        db1.commit()

        # Done
        print(f"{c.rowcount} data ditambah")

        # close
        db1.close()
        messagebox.showinfo('Done', 'Data Sudah ditambah')
    except:
        messagebox.showerror('Terjadi Kesalahan', 'Harap mengisi localhost, user, password\nIsi username hanya satu kali...')
    
    # Clear input box
    id_local.delete(0,END)
    id_usr.delete(0,END)
    id_passwd.delete(0,END)
    id_name.delete(0,END)
    id_pass.delete(0,END)
    id_user.delete(0,END)

home = Tk()
home.title('Aplikasi Admin')
home.geometry('420x350')

# buat frame
frhome = Frame(home, relief=RIDGE, borderwidth=5)
frhome.grid(row=0, column=0, ipadx=1, ipady=5, padx=5, pady=10)


lbl_adm = Label(frhome,text="Form Admin Website Baru")
lbl_adm.grid(row=0, column=1, columnspan=3, padx=10, pady=(10,0))
lbl_name = Label(frhome, text="Nama\t\t:")
lbl_name.grid(row=1, column=1, columnspan=3, padx=10, pady=(10,0))
lbl_user = Label(frhome, text="Username\t: ")
lbl_user.grid(row=2, column=1, columnspan=3)
lbl_pass = Label(frhome, text="Password\t:")
lbl_pass.grid(row=3, column=1, columnspan=3)

lbl_localhost = Label(frhome,text="Localhost phpmyadmin(mysql)")
lbl_localhost.grid(row=4, column=1, columnspan=3, padx=10, pady=(10,0))
lbl_local = Label(frhome, text="Localhost\t:")
lbl_local.grid(row=5, column=1, columnspan=3, padx=10, pady=(10,0))
lbl_usr = Label(frhome, text="User\t\t: ")
lbl_usr.grid(row=6, column=1, columnspan=3)
lbl_passwd = Label(frhome, text="Password\t:")
lbl_passwd.grid(row=7, column=1, columnspan=3)

id_name = Entry(frhome, width=20)
id_name.grid(row=1, column=4, columnspan=3, padx=10, pady=(10,0))
id_user = Entry(frhome, width=20)
id_user.grid(row=2, column=4, columnspan=3, padx=10, pady=(10,0))
id_pass = Entry(frhome, width=20)
id_pass.grid(row=3, column=4, columnspan=3, padx=10, pady=(10,0))

id_local = Entry(frhome, width=20)
id_local.grid(row=5, column=4, columnspan=3, padx=10, pady=(10,0))
id_usr = Entry(frhome, width=20)
id_usr.grid(row=6, column=4, columnspan=3, padx=10, pady=(10,0))
id_passwd = Entry(frhome, width=20)
id_passwd.grid(row=7, column=4, columnspan=3, padx=10, pady=(10,0))

btn_enter = Button(home, text="Enter", command=database)
btn_enter.grid(row=3, column=0, columnspan=2, padx=(10,0), pady=10, ipadx=23)



home.mainloop()
