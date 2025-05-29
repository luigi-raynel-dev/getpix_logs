# 🔑 Getpix Logs Microservice

The Getpix Logs microservice is part of the Getpix ecosystem, responsible for handling application logging in an asynchronous and scalable manner. It listens to a Kafka topic for log events sent by other services (like the API Gateway), then processes and stores them in a MongoDB database. Built with [HyperF](https://hyperf.io/) and powered by [Swoole](https://www.swoole.co.uk/). It ensures high performance for log processing and storage across the Getpix platform.


## 🧱 Tech Stack

- **[HyperF](https://hyperf.io/)** + **Swoole** — High-performance PHP framework for async operations.
- **Kakfa** — Messaging and event streaming.
- **PHP 8** — Strong-typed modern PHP code.
- **Docker** + **Docker Compose** — Containerized infrastructure.
- **MongoDB** — NoSQL database for logging and analytics.

## 🏗️ Architecture

```txt
[ Client ]
   |
   v
[ Getpix Gateway API ]
   |        \
   |         \-> (Kafka Topic) --> [ getpix_logs ]
   |
   \-> (gRPC) --> [ getpix_pix ]
```


## 📚 Repositories - Getpix ecosystem: 
- [getpix_gateway](github.com/luigi-raynel-dev/getpix_gateway): API Gateway responsible for orchestrating communication between services.

- [getpix_pix](github.com/luigi-raynel-dev/getpix_pix): Microservice responsible for the full CRUD of user Pix keys via gRPC.

## 🚀 Getting Started
✅ Requirements
- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/install/)
- [getpix_gateway](github.com/luigi-raynel-dev/getpix_gateway) [getpix_pix](github.com/luigi-raynel-dev/getpix_pix) and running up before.

📦 Running the Application
```bash
git clone https://github.com/luigi-raynel-dev/getpix_logs.git
cd getpix_logs
```

Start all services with Docker Compose:
```bash
docker compose up -d
```

Install composer packages into container
```bash
docker exec -it getpix_app bash -c "composer install --ignore-platform-req=ext-mongodb"
```

Copy the `.env.example` file into the `html` folder and rename it to `.env`.  
Then, fill in the environment variables according to your configuration.

### 📄 Example `.env` content:

```env
APP_NAME=logs
APP_ENV=dev

MONGODB_URI="mongodb://mongo:27017"
MONGODB_DATABASE="getpix_logs"

KAFKA_SERVERS="getpix_kafka:9092"
```


### 📦 Database - MongoDB Setup
The Getpix ecosystem uses MongoDB to store and manage data.

You have two options to get it running
- Option 1: Use MongoDB Atlas (Free)
  - Go to https://www.mongodb.com/cloud/atlas
  - Create a free account and cluster
  - Whitelist your IP and create a database user
  - Replace MONGODB_URI in your .env with your Atlas connection string Example: `MONGODB_URI="mongodb+srv://<user>:<password>@cluster0.mongodb.net/?retryWrites=true&w=majority"`
- Option 2: Run MongoDB with Docker
  - If you prefer to run MongoDB locally with Docker:
  ```bash
  docker run -d \
  --name mongo \
  -p 27017:27017 \
  -e MONGO_INITDB_ROOT_USERNAME=root \
  -e MONGO_INITDB_ROOT_PASSWORD=secret \
  mongo
  ```
  - Replace MONGODB_URI in your .env with connection string Example: `MONGODB_URI="mongodb://root:secret@localhost:27017"`
