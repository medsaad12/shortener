<template>
    <div class="UrlForm">
        <h1 class="UrlFormTitle">Welcome to Our URL Shortener!</h1>
        
        <div class="container">
        <h1>URL Shortener</h1>
        <form @submit.prevent="handleSubmit">
            <label for="long-url">Enter a Long URL:</label>
            <input type="text" v-model="url" id="long-url" name="url" placeholder="https://example.com" required>
            <input type="submit" value="Shorten URL">
            <span v-if="isError" class="err">{{ error }}</span>
            <div v-if="isCorrect">
             Your Short Url is : <br> 
             <input type="text" readonly :value="shortUrl" id="shortUrl">
             <button type="button" id="copyButton" @click="copyShortUrl">Copy</button>
            </div>
        </form>
        </div>
    </div>
  </template>
  
  <script>
  import axios from "axios"

  export default {
    name:"UrlForm",
    data(){
        return {
            url : "",
            isError : false,
            error : "",
            isCorrect : false,
            shortUrl : "",
        }
    },
    methods : {
        handleSubmit(){
            axios.post('http://127.0.0.1:8000/short/store',{
                url : this.url
            }).then((response)=>{
                this.isError = false
                this.isCorrect = true
                this.shortUrl = `http://127.0.0.1:8000/short/get/${response.data.link.id}`
            }).catch((err)=>{
                this.isCorrect = false
                this.isError = true
                this.error =  err.response.data.errors.url[0]
            })
        },
        copyShortUrl(){
            navigator.clipboard.writeText(this.shortUrl)
            this.isCopied = true
        }
        
    }
  }
  </script>
  
  <style>
  
  .container {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h1 {
            color: #0082d8;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            padding: 10px;
            border: none;
            border-bottom: 2px solid #ccc;
            border-radius: 3px;
            font-family: 'Poppins', sans-serif;
            outline: none;
        }

        input[type="submit"] {
            background-color: #0082d8;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 3px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
            
        }
        .UrlForm{
            height: 90.8vh;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: start;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            background-color: #0292f1;
        }
        .UrlFormTitle{
            font-size: 2.5rem; color: #eee; text-align: center
        }
        .err{
            color: red;
            font-family: 'Poppins', sans-serif;
            text-align: center;
        }
        #shortUrl{
            width: 70%;
            border-bottom: none;
            border: 1px solid #ccc;
            margin-right: 20px;
        }
        #copyButton{
            background-color: #0082d8;
            color: #fff;
            border: none;
            padding: 11px 17px;
            border-radius: 3px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
        }
       
  </style>