import './bootstrap';
import Vue from 'vue';
import Buefy from 'buefy';
import * as VueGoogleMaps from 'vue2-google-maps';
import { VTooltip } from 'v-tooltip';
import { setTooltipOptions } from './tooltip';
import VueLazyload from 'vue-lazyload';

import Navbar from './components/Navbar';
import Sidebar from './components/Sidebar';
import Captcha from './components/Captcha';
import ImageModal from './components/ImageModal';
import ImageCropModal from './components/ImageCropModal';
import Slider from './components/Slider';
import GroupTaxaSearchButton from './components/GroupTaxaSearchButton';

import DateInput from './components/inputs/DateInput';
import PhotoUpload from './components/inputs/PhotoUpload';
import SpatialInput from './components/inputs/SpatialInput';
import TaxonAutocomplete from './components/inputs/TaxonAutocomplete';
import UserAutocomplete from './components/inputs/UserAutocomplete';
import Wysiwyg from './components/inputs/Wysiwyg';
import ColumnsPicker from './components/inputs/ColumnsPicker';

import Table from './components/table/Table';
import TaxaTable from './components/tables/TaxaTable';
import UsersTable from './components/tables/UsersTable';
import FieldObservationsTable from './components/tables/FieldObservationsTable';
import ViewGroupsTable from './components/tables/ViewGroupsTable';

import UserForm from './components/forms/UserForm';
import TaxonForm from './components/forms/TaxonForm';
import FieldObservationForm from './components/forms/FieldObservationForm';
import ViewGroupForm from './components/forms/ViewGroupForm';

import FieldObservationActivityLog from './components/activity/FieldObservationActivityLog';
import TaxonActivityLog from './components/activity/TaxonActivityLog';

import CustomExport from './components/exports/CustomExport';

import FieldObservationsImport from './components/imports/FieldObservationsImport';

window.Vue = Vue;

Vue.use(VueLazyload, {
  attempt: 1,
  loading: 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB3aWR0aD0iNTAiIGhlaWdodD0iNTAiIHZpZXdCb3g9IjAgMCAzOCAzOCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBzdHJva2U9IiMzNjM2MzYiPgogICAgPGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj4KICAgICAgICA8ZyB0cmFuc2Zvcm09InRyYW5zbGF0ZSgxIDEpIiBzdHJva2Utd2lkdGg9IjIiPgogICAgICAgICAgICA8Y2lyY2xlIHN0cm9rZS1vcGFjaXR5PSIuNSIgY3g9IjE4IiBjeT0iMTgiIHI9IjE4Ii8+CiAgICAgICAgICAgIDxwYXRoIGQ9Ik0zNiAxOGMwLTkuOTQtOC4wNi0xOC0xOC0xOCI+CiAgICAgICAgICAgICAgICA8YW5pbWF0ZVRyYW5zZm9ybQogICAgICAgICAgICAgICAgICAgIGF0dHJpYnV0ZU5hbWU9InRyYW5zZm9ybSIKICAgICAgICAgICAgICAgICAgICB0eXBlPSJyb3RhdGUiCiAgICAgICAgICAgICAgICAgICAgZnJvbT0iMCAxOCAxOCIKICAgICAgICAgICAgICAgICAgICB0bz0iMzYwIDE4IDE4IgogICAgICAgICAgICAgICAgICAgIGR1cj0iMXMiCiAgICAgICAgICAgICAgICAgICAgcmVwZWF0Q291bnQ9ImluZGVmaW5pdGUiLz4KICAgICAgICAgICAgPC9wYXRoPgogICAgICAgIDwvZz4KICAgIDwvZz4KPC9zdmc+'
});
Vue.use(Buefy, { defaultIconPack: 'fa' });

// Config Google Maps
let gmapsConfig = {};
if (window.App && window.App.gmaps && window.App.gmaps.load) {
    gmapsConfig.load = {
        key: window.App.gmaps.apiKey,
        libraries: 'drawing',
        language: document.documentElement.lang
    }
}
Vue.use(VueGoogleMaps, gmapsConfig);

if (window.route) {
    Vue.prototype.$ziggy = window.route;
}

Vue.component(Navbar.name, Navbar);
Vue.component(Sidebar.name, Sidebar);
Vue.component(Captcha.name, Captcha);
Vue.component(ImageModal.name, ImageModal);
Vue.component(ImageCropModal.name, ImageCropModal);
Vue.component(Slider.name, Slider);
Vue.component(GroupTaxaSearchButton.name, GroupTaxaSearchButton);

Vue.component(Table.name, Table);
Vue.component(TaxaTable.name, TaxaTable);
Vue.component(UsersTable.name, UsersTable);
Vue.component(FieldObservationsTable.name, FieldObservationsTable);
Vue.component(ViewGroupsTable.name, ViewGroupsTable);

Vue.component(DateInput.name, DateInput);
Vue.component(PhotoUpload.name, PhotoUpload);
Vue.component(SpatialInput.name, SpatialInput);
Vue.component(TaxonAutocomplete.name, TaxonAutocomplete);
Vue.component(UserAutocomplete.name, UserAutocomplete);
Vue.component(Wysiwyg.name, Wysiwyg);
Vue.component(ColumnsPicker.name, ColumnsPicker);

Vue.component(FieldObservationForm.name, FieldObservationForm);
Vue.component(TaxonForm.name, TaxonForm);
Vue.component(UserForm.name, UserForm);
Vue.component(ViewGroupForm.name, ViewGroupForm);

Vue.component(FieldObservationActivityLog.name, FieldObservationActivityLog);
Vue.component(TaxonActivityLog.name, TaxonActivityLog);

Vue.component(CustomExport.name, CustomExport);

Vue.component(FieldObservationsImport.name, FieldObservationsImport);

Vue.prototype.trans = (string, args = {}) => {
    let value = window.App.i18n[string] || string;

    _.eachRight(args, (paramVal, paramKey) => {
        value = _.replace(value, `:${paramKey}`, paramVal);
    });

    return value;
};

Vue.filter('formatDateTime', function (value) {
  if (!value) return '';

  value = value.toString()

  return window.moment(value).format('DD.MM.YYYY HH:mm');
});

setTooltipOptions(VTooltip);
Vue.directive('tooltip', VTooltip);

const app = new Vue({
    el: '#app'
});
