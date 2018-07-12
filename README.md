# wkhtmltopdf-ws

This is fork of [schn/docker-wkhtmltopdf-ws](https://github.com/schn/docker-wkhtmltopdf-ws). 

wkhtmltopdf in a docker container as a web service.

Updates:

* Ubuntu 16.04
* wkhtmltopdf 0.12.5
* PHP 7

## Running web service

```sh
docker run -v /tmp/wkhtmltopdf:/tmp/wkhtmltopdf -p 10080:80 wkhtmltopdf-ws
```

The container now runs as a daemon. It binded on host port 10080 and using shared directory /tmp/wkhtmltopdf beetween container and host.
In this directory you can create input file and get output file.

## Using web service

Service takes wkhtmltopdf command as if you using it in your command line, and execute command within container.
Make POST request with "command" param in it.
