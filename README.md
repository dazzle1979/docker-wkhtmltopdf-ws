# docker-wkhtmltopdf-aas

This is fork of [wkhtmltopdf-aas container](https://hub.docker.com/r/openlabs/docker-wkhtmltopdf-aas).
wkhtmltopdf in a docker container as a web service.

This image is based on the 
[wkhtmltopdf container](https://registry.hub.docker.com/u/openlabs/docker-wkhtmltopdf/).

## Running the service

```sh
docker run -v /tmp/wkhtmltopdf:/tmp/wkhtmltopdf -p 10080:80 docker-wkhtmltopdf-aas
```

The container now runs as a daemon. It binded on host port 10080 and using shared directory /tmp/wkhtmltopdf beetween container and host.
In this directory you can create input file and get output file.

## Using the webservice

Service takes wkhtmltopdf command as if you using it in your command line, and execute it within container.
Make POST request with "command" param in it.
