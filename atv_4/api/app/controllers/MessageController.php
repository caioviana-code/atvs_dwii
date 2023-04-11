<?php

    namespace app\controllers;

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    use app\database\models\Message;

    class MessageController {

        private $message;

        public function __construct() {
            
            $this->message = new Message();
        }

        public function index(Request $request, Response $response, $args) {

            $data = $this->message->all();

            $response->getBody()->write(json_encode($data));

            return $response;
        }

        public function create(Request $request, Response $response, $args) {

            $input = $request->getParsedBody();

            $data = $this->message->create(array(

                'mes' => $input['mes'],

                'sigla' => $input['sigla'],

                'total' => $input['total']
            ));

            $response->getBody()->write(json_encode($data));

            return $response;
        }

        public function update(Request $request, Response $response, $args) {

            $input = $request->getParsedBody();

            $data = $this->message->update(

                array(

                    'total' => $input['total']
                ),

                array(

                    'id' => $args['id']
                )
            );

            $response->getBody()->write(json_encode($data));

            return $response;
        }

        public function delete(Request $request, Response $response, $args) {

            $data = $this->message->delete(

                array('id' => $args['id'])
            );

            $response->getBody()->write(json_encode($data));

            return $response;
        }
    }