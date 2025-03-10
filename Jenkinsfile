pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                git 'https://github.com/user/repository.git'
            }
        }

        stage('Install Dependencies') {
            steps {
                sh 'composer install'
            }
        }

        stage('Run CodeIgniter Server') {
            steps {
                sh 'nohup php spark serve --host=0.0.0.0 --port=8081 &'
            }
        }
    }
}
