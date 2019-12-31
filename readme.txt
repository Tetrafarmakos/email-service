--Commits Explained--

  commit -> initial commit for lumen
    The first step was to pull lumen and get the "Hello World" message.

  commit -> Installed mailjet package via composer
  commit -> Installed sendgrid package via composer
    Then i integrated via composer the packages that are essential for mail jet and send grid to work.

  commit -> simple basic interface and send email classes
    I started assuming that this was a case of dependency injection technique and with an interface class i could make the service fallback,
    so i proceeded by writing a basic structure.

  commit -> basic test command and interface rename
    I renamed the classes and wrote a basic command so i can post the request to the micro-service.
    Correct naming is very important. The code must be self explained.

  commit -> chain of responsibility pattern used instead of interface DI
    I didn't like the idea of doing the "service unavailable check" in lumen service provider.
    I thought of doing a check service function and bind the classes with the interface accordingly,
    but there wasn't an easy way throw the providers API(mail jet and send grid),
    plus i didn't want to put much logic and checks in service provider as i mentioned.
    So used the chain of responsibility pattern which i thing is well suited for our case.

  commit -> initial mail jet api integration
  commit -> initial send grid api integration
    I made a separate class for each email service so i can initialize them separately and configure the order of the service execution.
    I implemented the send email via api that the external services(mail jet and send grid) provide.

  commit -> email send throw json api command
    Initialized the command with the basic information for the email service and made a post request through the command by using guzzle.

  commit -> redis integration
    Then i integrated via composer the packages that are essential for redis to work and i made the basic configuration.

  commit -> redis integration and used job Inheritance to dispatch them through chain of responsibility pattern
    After using a queuing mechanism there was no way of checking the response of the API provided by the external services(jobs are not executed,
    they are pushed into a queue, as a result you can't know if the email has failed to be delivered),
    that's why i needed to integrate the queue job to the chain of responsibility pattern.
    So i added two functions to the class that my jobs inherits.
    In that way i used the abstraction that was already there and i added the chain of responsibility abilities that are necessary for the fallback.

  commit -> refactor for controller to be agnostic,log files and env variables
    I wrote a separate class that decides the order of the email services and initializes them.
    The controller should be agnostic and only handle the requests. Did a general refactor to the code.

  commit -> migration and data insert for send emails table
    Added a basic table to store the emails that the service has send. Already logged the ones that failed.

  commit -> phpunit testing
    Added a basic test for the controller response. I know this test is of low meaning.
    If i mock the email send service then the other procedures are the ones that should be tested as well as the behavior of the service.
    I don't have many info of how you want the service to behave and i believe that in a real life scenario we would have more cases to test.
    Plus the chain of responsibility pattern initializes the class objects witch makes it harder to test.
    If i had more time i could mock the queues and expand the tests.

--Docker--

  I wrote this project in windows environment so i used laragon. I pulled it in my work laptop where i use laradock(docker for Laravel).
  The services that are necessary are nginx,mysql and redis(docker-compose up -d nginx mysql redis).
  I use a Setup for Multiple Projects so i didn't upload laradock folder to GitHub.If you want i can upload it, in case you want to build it just for this project.

--Bonus Points--

  I believe that bonus point functionalities are low level.
  The external services provide multiple formats and the multiple recipients can be done by passing an array of addresses.
  If it is meaningful for you i can proceed with these as well, i will just need some info of the data structure i will receive to the back end.
