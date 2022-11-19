cd app
sudo chmod 644 logs.log
sudo chown www-data logs.log
sudo chown www-data clave.txt
sudo chmod 400 clave.txt
cd ..
sudo docker build -t="web" .
sudo docker-compose up
