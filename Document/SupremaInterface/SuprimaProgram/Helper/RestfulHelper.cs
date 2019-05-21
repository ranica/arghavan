﻿using Newtonsoft.Json;
using SuprimaProgram.Model;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Http;
using System.Net.Http.Headers;
using System.Text;
using System.Threading.Tasks;

namespace SuprimaProgram.Helper
{
    public class RestfulHelper
    {
        public const string C_HEADER_ACCEPT = "Accept";
        public const string C_HEADER_BEARER = "Bearer";
        public const string C_HEADER_VALUE_APP_JSON = "application/json";
        public string token = "";
        public string baseUrl { get; private set; }

        public HttpClient client = new HttpClient();


        public RestfulHelper(string baseUrl)
        {
            this.baseUrl = baseUrl;

            client = new HttpClient();

            client.BaseAddress = new Uri(baseUrl);
        }

        /// <summary>
        /// Connect to Server
        /// </summary>
        /// <param name="username"></param>
        /// <param name="password"></param>
        /// <param name="url"></param>
        /// <returns></returns>
        public async Task<string> 
        connect(string username,
                string password,
                string url)
        {
            var content = new FormUrlEncodedContent(new[]
            {
                new KeyValuePair<string, string>("code", username),
                new KeyValuePair<string, string>("password", password),
            });

            var result = await client.PostAsync(url, content);

            string resultContent = await result.Content.ReadAsStringAsync();

            LoginResponseModel loginResult = JsonConvert.DeserializeObject<Model.LoginResponseModel>(resultContent);

            this.token = loginResult.success.token;

            return token;
        }

        /// <summary>
        /// is Connect
        /// </summary>
        public bool 
        isConnected
        {
            get
            {
                /// todo: get

                return false;
            }
        }

        /// <summary>
        /// Disconnect
        /// </summary>
        public void 
        disconnect()
        {
            //client.
        }

        /// <summary>
        /// Request 
        /// </summary>
        /// <param name="url"></param>
        /// <returns></returns>
        public async Task<string> 
        request(string url)
        {
            client.DefaultRequestHeaders.Accept.Clear();
            client.DefaultRequestHeaders.Accept.Add(new MediaTypeWithQualityHeaderValue(C_HEADER_VALUE_APP_JSON));

            client.DefaultRequestHeaders.Add(C_HEADER_ACCEPT, C_HEADER_VALUE_APP_JSON);
            client.DefaultRequestHeaders.Authorization =
                            new AuthenticationHeaderValue(C_HEADER_BEARER, HttpClientData.token);


            var result = await client.PostAsync(url, null);
            string resultContent = await result.Content.ReadAsStringAsync();

            return resultContent;
        }

        /// <summary>
        /// Request Search Data
        /// </summary>
        /// <param name="code"></param>
        /// <param name="url"></param>
        /// <returns></returns>
        public async Task<PersonModel> requestSearch(string code,
                                                string url)
        {
            client.DefaultRequestHeaders.Accept.Clear();
            client.DefaultRequestHeaders.Accept.Add(new MediaTypeWithQualityHeaderValue(C_HEADER_VALUE_APP_JSON));

            client.DefaultRequestHeaders.Add(C_HEADER_ACCEPT, C_HEADER_VALUE_APP_JSON);

            client.DefaultRequestHeaders.Authorization =
                            new AuthenticationHeaderValue(C_HEADER_BEARER, HttpClientData.token);

            var content = new FormUrlEncodedContent(new[]
            {
                new KeyValuePair<string, string>("code", code),
            });

            var result = await client.PostAsync(url, content);

            string resultContent = await result.Content.ReadAsStringAsync();

            PersonModel responseResult = null;

            try
            {
                if (null != resultContent)
                {
                    responseResult = JsonConvert.DeserializeObject<Model.PersonModel>(resultContent);
                }
            }
            catch (Exception ex)
            {
                LoggerExtensions.log(ex);
            }

            return responseResult;
        }

        /// <summary>
        /// Request Update
        /// </summary>
        /// <param name="data"></param>
        /// <param name="url"></param>
        /// <returns></returns>
        public async Task<string> requestSave(PersonModel data,
                                                      string url)
        {
            string responseResult = null;

            try
            {

                client.DefaultRequestHeaders.Accept.Clear();

                client.DefaultRequestHeaders.Accept.Add(new MediaTypeWithQualityHeaderValue(C_HEADER_VALUE_APP_JSON));

                client.DefaultRequestHeaders.Add(C_HEADER_ACCEPT, C_HEADER_VALUE_APP_JSON);

                client.DefaultRequestHeaders.Authorization =
                                new AuthenticationHeaderValue(C_HEADER_BEARER, HttpClientData.token);


                ByteArrayContent byteContent = new ByteArrayContent(data.success[0].fingerprint_image);

                var content = new FormUrlEncodedContent(new[]
                {

                    new KeyValuePair<string, string>("user_id",
                                                        data.success[0].user_id.ToString()),

                    new KeyValuePair<string, string>("fingerprint_user_id",
                                                    data.success[0].fingerprint_user_id.ToString()),

                    new KeyValuePair<string, string>("fingerprint_image",
                                                        data.success[0].fingerprint_image.ToString()),


                    new KeyValuePair<string, string>("fingerprint_quality",
                                                    data.success[0].fingerprint_quality.ToString()),

                    new KeyValuePair<string, string>("fingerprint_template", 
                                                    data.success[0].fingerprint_template),

                });


                var result = await client.PostAsync(url, content);

                string resultContent = await result.Content.ReadAsStringAsync();



                responseResult = result.StatusCode.ToString();

            }
            catch (Exception ex)
            {
                LoggerExtensions.log(ex);
            }

            return responseResult;
        }


    }
}
