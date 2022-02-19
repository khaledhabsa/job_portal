## Deploy on Kubernetes:

**requirements**
1. Docker Installed.
2. Rancher Desktop - https://rancherdesktop.io .
3. kubectl if not installed .

*Build  your docker image:*
```sh
$ cd app
$ docker build . -t image-name
$ docker run -p 80:80 -d image-name
# Get container ID
$ docker ps
```

## Deploy to Kubernetes - Rancher Desktop or other types. 
1. create a deployment .
```sh 
$ kubectl apply -f kubernetes/deployment.yaml 
deployment.apps/image-name created

$  kubectl get pods
```

2. create a service to expose this app .
```sh
$ kubectl apply -f kubernetes/service.yaml
service/image-name created

$ kubectl get svc
```