import axios from 'axios';
import select2 from 'select2';
import $ from 'jquery';


import dayjs from 'dayjs';
import 'dayjs/locale/id'; // Import the Indonesian locale

dayjs.locale('id'); // Set the locale globally

function hariTanggal(tanggal) {
        return dayjs(tanggal).format('dddd, DD MMMM YYYY');
}

window.hariTanggal = hariTanggal;


select2();
window.$ = $;
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
