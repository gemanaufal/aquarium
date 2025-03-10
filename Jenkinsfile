pipeline {
    agent any

    environment {
        PHP_IMAGE = "php:8.2-cli"   // Gunakan image PHP 8.2
        COMPOSER_CACHE_DIR = "$WORKSPACE/.composer"
    }

    stages {
        stage('Checkout') {
            steps {
                script {
                    git branch: 'main', url: 'https://github.com/gemanaufal/aquarium.git'  // Ganti dengan repo kamu
                }
            }
        }

        stage('Install Dependencies') {
            steps {
                script {
                    docker.image(PHP_IMAGE).inside {
                        sh 'php -v'  // Cek PHP version
                        sh 'composer install --no-dev --prefer-dist'
                    }
                }
            }
        }

        stage('Run Migrations') {
            steps {
                script {
                    docker.image(PHP_IMAGE).inside {
                        sh 'php spark migrate'  // Jalankan migrasi database
                    }
                }
            }
        }

        stage('Start Application') {
            steps {
                script {
                    docker.image(PHP_IMAGE).inside {
                        sh 'php spark serve --host=0.0.0.0 --port=8089 &'
                    }
                }
            }
        }
    }

    post {
        always {
            echo "Pipeline Completed."
        }
    }
}
