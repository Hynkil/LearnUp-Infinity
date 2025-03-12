# LearnUp - Oktatási weboldal
#BÉTA
A LearnUp egy interaktív tanulási weboldal, amely segít tantárgyak elsajátításában.  

## 🌟 Fő funkciók  
✅ Tantárgyak (magyar nyelv, irodalom, történelem, matek)  
✅ Kvízek és tesztek  
✅ Felhasználói fiókok és előfizetés  
✅ PHP alapú backend és MySQL adatbázis  

## 🚀 Telepítés  
1. Klónozd a repót:  
   ```sh
   git clone https://github.com/Felhasznalo/LearnUp.git
## Futtatás
1. Töltsd le az XAMPP programot és ha megvan akkor indísd el.
2. A "LearnUp" mappát úgy ahogy van tedd bele a C:/.../XAMPP/htdocs/, mappába.
3. XAMPP alkalmazásban indísd el az "Apache" és "MySQL".
4. Bőngészőbe ird be: localhost:80/phpmyadmin/, és ott létre kell hozni egy adatbázist azon a néven, hogy: "webapp_db"
5. Ezek után nyomj rá az adatbázisra és utána arra hogy lekérdezés/SQL (ahova tudod irni kódot), és másold be ezt:
   ```sh
   CREATE TABLE users(
   id INT PRIMARY AUTO_INCREMENT,
   name VARCHAR(255) NOT NULL,
   email VARCHAR(255) NOT NULL UNIQUE,
   password VARCHAR(255) NOT NULL
   );
   CREATE TABLE user_lessons(
   id INT PRIMARY AUTO_INCREMENT,
   user_id INT,
   subject VARCHAR(255) NOT NULL,
   lesson_number VARCHAR(255) NOT NULL,
   lesson_page VARCHAR(255) NOT NULL,
   FOREIGN KEY (user_id) REFERENCES users(id)
   );
6. Futtasd le ezt a kódot és ha kész akkor nincs más dolgod mint beírni: https://localhost/LearnUp vagy localhost:80/LearnUp
- !!! ESETLEGES !!!
- Ha nem müködne a link vagy nem tud localhosttal csatlakozni akkor nyissa meg a cmd és irja be:
- ```sh
  ipconfig
- Keresd azt hogy Ipv4 és az ottani lokális ip címedet másold ki (pl.: 192.168.1.100), és írd be bőngészőbe és írd utána, hogy *:80 (pl.: 192.168.100:80), ezek után ha minden jó írd utána hogy /LearnUp/
## Veszélyek
-A coding résznél meg van a veszélye hogy eltolódik és vele együtt a bug fixing és a testing.
<br>-A logo létrehozása nagyon a végénél van ami azt a veszélyt hozza létre hogy ha eltolódik akkor túl megy a idő határon.
