# About
System design to decoubling registration module on monolethic application to be scalable micro-service.

## Requirements and Goals of the System
We will be designing a registration service with the following requirements:
#### Functional Requirements:
- Users should be able to register using email.
- Users should be notified with registration compilation using Email and SMS.
#### Non-Functional Requirements:
- The system should be highly available.

## System APIs:
We can have SOAP or REST APIs to expose the functionality of our service. Following could be the definition of the API for creating a new account:
Registration endpoint would be: 
```sh
register(username, email, password, mobile_number)
```
#### Parameters:
**first_name** (string): The user's first name, typically up to 30 characters.          
**last_name** (string): The user's last name, typically up to 30 characters.        
**password** (password):user password and would be encrypted.            
**mobile_number** (number): Optional mobile number.   
     
**Returns**: (string)           
A successful post will return a success message. Otherwise, an error message is returned.              
 
## High level design:
Following short description for high level design of component, we will build/use:    

**Web servers:** To maintain a connection with the clients. This connection will be used to transfer data between the user and the server.    

**Application server:** To execute the registration workflows of storing new users in the database servers. Also will be responsible for creating user profiles and triggering actions like sending emails, sms to users notifying them with success registration.                  

**DB Cluster:** To store users data.        

**Notification Queue:** To queue and prioritize the notification.                    

**Notification Service:** To notify users with successful registration and it may be decoupled to a couple of functions as sending OTPs is more critical than an email marketing campaign.                 

**Load balancing:** We can add a load balancing layer at two places in our system:       
1) Between Clients and Web servers          
2) Between Web servers and Application/registration servers.     
Initially, a simple Round Robin approach can be adopted.

![alt text](https://github.com/khaledhabsa/job_portal/blob/main/system_design_architecture.png)
