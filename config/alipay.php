<?php
return array (	
		//应用ID,您的APPID。
		'app_id' => "2016101800717602",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEpAIBAAKCAQEApLI3LdsZw8KN/9pav2T3EEQrjEwqixu2USIKtqGHh4K3FZMcudRnOKVwmR+8sMgufdwwO2qTGwDmdbRiWCaFf5pZqQMCs1B455F6omYSbhhLUHWvAX3nDNgGa9mWsq/ndl75PsBFzey9KyDspaP+G6neQSdBl+LYusl4xogYDma52raspeRAgHBHGt4ajgTIM4kNRF6nuDg2qFXyVCPDGl2XqRwaW7qwJWHzHeeKbaTGYo65aWb4/rR4pyLx+RSR+u07vww4N5BJhd0ShZMOoqPv9rqYLFSNHNTKucul82AMiDWWlPN8j+9iOrZiLasSwO7vtNmlPbNGGbBlDoLhbwIDAQABAoIBAH4ueG4uln/QOIEUp0BKN6wDvqWf2Vx43+crQLAJ889Ty7fA3VpWrLrOrgTzNtrulAgjweRT0971gpwdltdYtCE+fYEq6E+/0NICOMXhlC87d8BuWaW382R4wfqxW28NrDWZsDZuk0yhG5HGiOijS1WggMLEM9INn+UD5P+eV2f3+OUzfBoRRRQpm3PazkuNPwzdKfE3jbtSHX+wXIsJbtAp4/pQSS0nBqyhGvbywdwA0rRCBoT+q1J85X11bMCpZ+jEnnWC95XvMGZYh/meQ0it7Ke4PX/t+7NGd5apsoyKAskXV2yLsZgDM9IRTsesWIBTYOpzATR86XoMIwOyy+kCgYEA6tN30Gd4TBMdcqJd80gstu3hZVh7JZHfxStVzsgfKnffMn+OEcJXLv6tMAzgvlXzcFaLCoyTkLT07E7ioEj8zSVGvOBaYDBDjUukf+q4OSViUkH3WKlJ5AHpLAt8MqMYV7rQIEEUf3vQQdEMaFPZyQU9l+nJKxBnTu0Y1dVei2sCgYEAs4vtM5KtZz4iMo5HroyRQwHaqtIOqDnVKdHkGeIfDEU6ielBqTBiZiVyqYXYLXwqQiRcbF45cRUIrQeAe4FUKFNUlle4aQO9/cVUETHEzH2h7geJgGTyq0KwDhEbebS1CqZsQYC3es8IdvaXLG2LpE82gQFRV4kLGlAqhy8Jpw0CgYEAiyK3GB1mkrS0uwpnXlGCZPT3muPdO3p+OsYddoLurGwQLEyVsgITRD4UAadvtncY4ZP1mE+I07HUePuYnd4BI9AVZK4N/nY6YErUchJyCzISWqjJVJghtt5G+RjpAtvN/ZUr4iCNc6e50nV5w4sDPG9FenBECKcUfxhOocxl03cCgYAt+InHRqr3YEVJRHy+CGe5DGR8kEQIdqZJiuAocGkary8J2JtjQmwvUy9EkGyFWOFJBh5T8NwsRAJwqxcOiFKP8KYbyGIDIV4n97pKnL+SzCgF1hAyu6YWi4CgWWj7hHVGQM4/B0HzQ8cbDpAuY+35J/8AkOHO09vv5M6+xiBmkQKBgQCaYzUnHwHP6GKFk0lZoK4V1NBnjCkbux4o6JKTokaYdWC9aWjfeCnPItp/rzCR9XG/e4HJG18KXy2ZkWIa6oSJCy+jlbuMkuvNR4pAQHpMOD5SSrHrjuy9TRPCHbb8LNeWmTeJejq4ZQsYj9flpIvJW/kHi6/p/K0d4MbHZdQZ4w==",
		
		//异步通知地址
		'notify_url' => "http://工程公网访问地址/alipay.trade.wap.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://www.kaoshi.com/return_url",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAku0yh1UHI1hwhprhECuAIf8p8X21h71xJenmR5HDVz1BPa4c+HPH16V97QVZZODSlSxDGc66VPN7k4LSNcPW7WFdxPOn+jYVXS/D2OHQZp8DBv7P0ZG7aUfb3r/vP8uFo5slELINt6/c2e4btyoRe8EP7wsBbEIrOOYGpN1pYaojD6e2ScYEhsOhOJb3MzhC4iD0dPIw0+NnRnV1eQwJH6ub89FTffCZ91L4nurGGA1y9JSo4w7u1NVOeFMJGYkWhroBbag6NkFMTwQzEGS3YJkYGwzHnrg7y4fYG5vABZCQq/Lx6xdXUKEQkqpC7p9UnfYsSBQSVbHaB02lfL9NZQIDAQAB",
		
	
);