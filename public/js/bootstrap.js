window.axios = require('axios');
window.axios.defaults.headers.common = {
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    'X-Requested-With': 'XMLHttpRequest'
};
window.axios.defaults.baseURL = '/api';
window.axios.defaults.withCredentials = true;
