Place configuration files in this directory.
swagger: "2.0"
info:
  version: "0.0.1"
  title: Hello World App
# during dev, should point to your local machine
host: localhost:10010
# basePath prefixes all resource paths 
basePath: /
# 
schemes:
  # tip: remove http to make production-grade
  - http
  - https
# format of bodies a client can send (Content-Type)
consumes:
  - application/json
# format of the responses to the client (Accepts)
produces:
  - application/json
paths:
  /api/users/login:
    # binds a127 app logic to a route
    x-swagger-router-controller: LOGIN
    get:
      description: Login the user and return a token describing an encrypted user id
      # used as the method name of the controller
      operationId: LOGIN
      parameters:
        - name: username
          in: query
          description: The username/email of the user
          required: true
          type: string
        - name: passord
          in: query
          description: The passzord of the user
          required: true
          type: string
      responses:
        "200":
          description: Success
          schema:
            # a pointer to a definition
            $ref: "#/definitions/LoginResponse"
        # responses may fall through to errors
        default:
          description: Error
          schema:
            $ref: "#/definitions/ErrorResponse"
  /swagger:
    x-swagger-pipe: swagger_raw
# complex objects have schema definitions
definitions:
  LoginResponse:
    required:
      - token
    properties:
      token:
        type: string
  ErrorResponse:
    properties:
      message:
        type: string
