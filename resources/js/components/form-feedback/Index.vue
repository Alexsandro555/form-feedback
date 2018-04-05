<template>
    <form @submit.prevent="onSubmit" name="zakaz_tovara" @keydown="form.errors.clear($event.target.name)">
        <table class="orderform" cellpadding="0" cellspacing="0">
            <tbody valign="top">
                <tr valign="middle">
                    <th colspan="2">
                        Форма запроса на оборудование
                    </th>
                </tr>
                <tr valign="middle">
                    <td class="aright">
                        Как Вас зовут? (Ф.И.О): <span class="red">*</span>&nbsp;
                    </td>
                    <td>
                        <input v-model="form.fio" :name="'fio'" size="60" value="" type="text"><br>
                        <span class="help is-danger" v-if="form.errors.has('fio')" v-text="form.errors.get('fio')"></span>
                    </td>
                </tr>
                <tr valign="middle">
                    <td class="aright">
                        Название Вашей компании: <span class="red">*</span>&nbsp;
                    </td>
                    <td>
                        <input v-model="form.company" :name="'company'" size="60" value="" type="text"><br>
                        <span class="help is-danger" v-if="form.errors.has('company')" v-text="form.errors.get('company')"></span>
                    </td>
                </tr>
                <tr valign="middle">
                    <td class="aright">
                        Ваш контактный телефон: <span class="red">*</span>&nbsp;
                    </td>
                    <td>
                        <input v-model="form.tel" :name="'tel'" size="60" value="" type="text"><br>
                        <span class="help is-danger" v-if="form.errors.has('tel')" v-text="form.errors.get('tel')"></span>
                    </td>
                </tr>
                <tr valign="middle">
                    <td class="aright">
                        Ваш электронный адрес (E-mail):
                    </td>
                    <td>
                        <input v-model="form.email" :name="'email'" size="60" value="" type="text"><br>
                        <span class="help is-danger" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span>
                    </td>
                </tr>
                <tr valign="middle">
                    <td>
                        Запрос:
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <textarea v-model="form.description" :name="'description'" style="width: 98%; height: 100px;"></textarea><br>
                        <span class="help is-danger" v-if="form.errors.has('description')" v-text="form.errors.get('description')"></span>
                    </td>
                </tr>
                <tr>
                    <td class="aright">
                        Согласен на обработку персональных данных:
                    </td>
                    <td colspan="2">
                        <input v-model="form.accepted" :name="'accepted'" type="checkbox">
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="red">* Поля обязательные для заполнения</span>
                    </td>
                    <td class="aright">
                        <input type='submit' :disabled="!form.accepted" value='Заказать' />
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</template>
<script>
    import {Form} from '../form/Form.js'

    export default {
        created() {
            this.$http.get('/getUID', {}).then((response) =>
            {
                this.form.uid = response.data;
            }).catch(function (error)
            {
                console.log(error);
            });
        },
        data: function() {
            return {
                form: new Form({
                    fio: '',
                    company: '',
                    tel: '',
                    email: '',
                    description: '',
                    accepted: false,
                    uid: ''
                }),
            }
        },
        mounted: function() {
        },
        methods: {
            onSubmit() {
                this.form.submit('post', '/form-feedback/save').then(data => console.log(data)).catch(errors => console.log(errors));
            },
        }
     }
</script>

<style>
    .is-danger {
        font-size: 6pt;
        color: red;
    }
</style>