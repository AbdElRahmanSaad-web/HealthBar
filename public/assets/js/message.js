// import './bootstrap';

// import io from './node_modules/socket.io-client/dist/socket.io.js';
//
// import Echo from './node_modules/laravel-echo/dist/echo';

import Echo from '../../../node_modules/laravel-echo/dist/echo.js';
import io from '../../../node_modules/socket.io-client/dist/socket.io.js';

const socket = io(process.env.HTTP_SOCKET || process.env.WS_SOCKET);
const echo = new Echo({
    broadcaster: 'socket.io',
    client: socket,
});

echo.private(`admins.527.${Id}`)
    .listen('NewMessage', (data) => {
        console.log('New message received:', data.message);
    });

