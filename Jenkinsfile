pipeline {
    agent any

    environment {
        PHP_IMAGE = "php:8.2-apache"  // Pastikan pakai image yang benar
        CONTAINER_NAME = "aquarium"
        APP_PORT = "8089"  // Sesuaikan port yang diinginkan
    }

    stages {
        stage('Pull Image') {
            steps {
                script {
                    sh "docker pull ${PHP_IMAGE}"
                }
            }
        }

        stage('Run Container') {
            steps {
                script {
                    // Stop & remove container jika sudah ada sebelumnya
                    sh """
                        docker stop ${CONTAINER_NAME} || true
                        docker rm ${CONTAINER_NAME} || true
                        docker run -d --name ${CONTAINER_NAME} -p ${APP_PORT}:8089 ${PHP_IMAGE}
                    """
                }
            }
        }

        stage('Check Running Container') {
            steps {
                script {
                    sh "docker ps"
                }
            }
        }
    }

    post {
        always {
            script {
                sh "docker logs ${CONTAINER_NAME} || true"
            }
        }
    }
}
