sudo docker build -t="web" .
sudo docker-compose up
cd app
sudo chmod 644 logs.log
sudo chown www-data logs.log
cd ..
