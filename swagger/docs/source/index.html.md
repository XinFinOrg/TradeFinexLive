---
title: XinFin APIs
language_tabs:
  - shell: cURL
  - node: Node.js
  - go: GO
  - ruby: Ruby
  - python: Python
  - java: Java
toc_footers: []
includes: []
search: true
highlight_theme: darkula
headingLevel: 2

---

<h1 id="XinFin-apis">XinFin APIs v1.0.0</h1>

> Scroll down for code samples, example requests and responses. Select a language for code samples from the tabs above or the mobile navigation menu.

Happy to code XinFin APIs

License: <a href="https://github.com/XinFinOrg">Github</a>


<!-- Generator: Widdershins v3.6.6 -->

<h1 id="XinFin-json-rpc">XinFin JSON-RPC v1.0.0</h1>

> Scroll down for code samples, example requests and responses. Select a language for code samples from the tabs above or the mobile navigation menu.

A collection holding all the XinFin JSON​ RPC API calls

Base URLs:

* <a href="https://rpc.xinfin.network">https://rpc.xinfin.network</a>

<h1 id="XinFin-json-rpc-web3">web3</h1>

API for web3 request

## clientRequest

<a id="opIdclientRequest"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/clientVersion \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"web3_clientVersion","params":[],"id":1}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/clientVersion",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0',
  method: 'web3_clientVersion',
  params: [],
  id: 1 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/clientVersion"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"web3_clientVersion\",\"params\":[],\"id\":1}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/clientVersion")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"web3_clientVersion\",\"params\":[],\"id\":1}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"web3_clientVersion\",\"params\":[],\"id\":1}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/clientVersion", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/clientVersion")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"web3_clientVersion\",\"params\":[],\"id\":1}")
  .asString();
```

`POST /clientVersion`

Returns the current client version.

**Parameters**

none

**Returns**

`String` - The current client version

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "web3_clientVersion",
  "params": [],
  "id": 1
}
```

<h3 id="clientrequest-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[clientVersionRequest](#schemaclientversionrequest)|true|none|

<h3 id="clientrequest-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful Operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## sha3Request

<a id="opIdsha3Request"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/sha3 \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"web3_sha3","params":["0x68656c6c6f20776f726c64"],"id":64}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/sha3",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0',
  method: 'web3_sha3',
  params: [ '0x68656c6c6f20776f726c64' ],
  id: 64 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/sha3"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"web3_sha3\",\"params\":[\"0x68656c6c6f20776f726c64\"],\"id\":64}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/sha3")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"web3_sha3\",\"params\":[\"0x68656c6c6f20776f726c64\"],\"id\":64}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"web3_sha3\",\"params\":[\"0x68656c6c6f20776f726c64\"],\"id\":64}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/sha3", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/sha3")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"web3_sha3\",\"params\":[\"0x68656c6c6f20776f726c64\"],\"id\":64}")
  .asString();
```

`POST /sha3`

Returns Keccak-256 (not the standardized SHA3-256) of the given data.

**Parameters**

- `DATA` - the data to convert into a SHA3 hash

`params:` `[
  "0x68656c6c6f20776f726c64"
]`

**Returns**

`DATA` - The SHA3 result of the given string.

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "web3_sha3",
  "params": [
    "0x68656c6c6f20776f726c64"
  ],
  "id": 64
}
```

<h3 id="sha3request-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[sha3request](#schemasha3request)|true|none|

<h3 id="sha3request-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful Operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

<h1 id="XinFin-json-rpc-net">net</h1>

API for network request

## versionRequest

<a id="opIdversionRequest"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/version \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"net_version","params":[],"id":67}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/version",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0', method: 'net_version', params: [], id: 67 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/version"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"net_version\",\"params\":[],\"id\":67}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/version")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"net_version\",\"params\":[],\"id\":67}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"net_version\",\"params\":[],\"id\":67}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/version", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/version")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"net_version\",\"params\":[],\"id\":67}")
  .asString();
```

`POST /version`

Returns the current network id.

**Parameters**

none

**Returns**

- `String` - The current network id.

  - `"50"`: XinFin Mainnet

  - `"51"`: XinFin Testnet

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "net_version",
  "params": [],
  "id": 67
}
```

<h3 id="versionrequest-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[versionrequest](#schemaversionrequest)|true|none|

<h3 id="versionrequest-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful Operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## listeningRequest

<a id="opIdlisteningRequest"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/listening \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"net_listening","params":[],"id":67}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/listening",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0', method: 'net_listening', params: [], id: 67 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/listening"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"net_listening\",\"params\":[],\"id\":67}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/listening")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"net_listening\",\"params\":[],\"id\":67}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"net_listening\",\"params\":[],\"id\":67}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/listening", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/listening")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"net_listening\",\"params\":[],\"id\":67}")
  .asString();
```

`POST /listening`

Returns `true` if client is actively listening for network connections.

**Parameters**

none

**Returns**

- `Boolean` - `true` when listening, otherwise `false`.

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "net_listening",
  "params": [],
  "id": 67
}
```

<h3 id="listeningrequest-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[listeningrequest](#schemalisteningrequest)|true|none|

<h3 id="listeningrequest-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful Operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## peerCountRequest

<a id="opIdpeerCountRequest"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/peerCount \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"net_peerCount","params":[],"id":74}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/peerCount",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0', method: 'net_peerCount', params: [], id: 74 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/peerCount"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"net_peerCount\",\"params\":[],\"id\":74}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/peerCount")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"net_peerCount\",\"params\":[],\"id\":74}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"net_peerCount\",\"params\":[],\"id\":74}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/peerCount", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/peerCount")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"net_peerCount\",\"params\":[],\"id\":74}")
  .asString();
```

`POST /peerCount`

Returns number of peers currently connected to the client.

**Parameters**

none

**Returns**

- `QUANTITY` - integer of the number of connected peers.

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "net_peerCount",
  "params": [],
  "id": 74
}
```

<h3 id="peercountrequest-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[peerCountRequest](#schemapeercountrequest)|true|none|

<h3 id="peercountrequest-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful Operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

<h1 id="XinFin-json-rpc-eth">eth</h1>

API for eth information

## protocolVersionRequest

<a id="opIdprotocolVersionRequest"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/protocolVersion \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_protocolVersion","params":[],"id":67}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/protocolVersion",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0',
  method: 'eth_protocolVersion',
  params: [],
  id: 67 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/protocolVersion"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_protocolVersion\",\"params\":[],\"id\":67}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/protocolVersion")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_protocolVersion\",\"params\":[],\"id\":67}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_protocolVersion\",\"params\":[],\"id\":67}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/protocolVersion", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/protocolVersion")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_protocolVersion\",\"params\":[],\"id\":67}")
  .asString();
```

`POST /protocolVersion`

Returns the current ethereum protocol version.

**Parameters**

none

**Returns**

- `String` - The current ethereum protocol version

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_protocolVersion",
  "params": [],
  "id": 67
}
```

<h3 id="protocolversionrequest-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[protocolVersionRequest](#schemaprotocolversionrequest)|true|none|

<h3 id="protocolversionrequest-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful Operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## syncingrequest

<a id="opIdsyncingrequest"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/syncing \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_syncing","params":[],"id":1}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/syncing",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0', method: 'eth_syncing', params: [], id: 1 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/syncing"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_syncing\",\"params\":[],\"id\":1}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/syncing")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_syncing\",\"params\":[],\"id\":1}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_syncing\",\"params\":[],\"id\":1}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/syncing", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/syncing")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_syncing\",\"params\":[],\"id\":1}")
  .asString();
```

`POST /syncing`

Returns an object with data about the sync status or false.

**Parameters**

none

**Returns**

- `Object|Boolean`, An object with sync status data or FALSE, when not syncing:

  - `startingBlock`: `QUANTITY` - The block at which the import started (will only be reset, after the sync reached his head)

  - `currentBlock`: `QUANTITY` - The current block, same as eth_blockNumber

  - `highestBlock`: `QUANTITY` - The estimated highest block

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_syncing",
  "params": [],
  "id": 1
}
```

<h3 id="syncingrequest-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[syncingrequest](#schemasyncingrequest)|true|none|

<h3 id="syncingrequest-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful Operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## coinbase

<a id="opIdcoinbase"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/coinbase \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_coinbase","params":[],"id":64}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/coinbase",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0', method: 'eth_coinbase', params: [], id: 64 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/coinbase"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_coinbase\",\"params\":[],\"id\":64}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/coinbase")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_coinbase\",\"params\":[],\"id\":64}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_coinbase\",\"params\":[],\"id\":64}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/coinbase", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/coinbase")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_coinbase\",\"params\":[],\"id\":64}")
  .asString();
```

`POST /coinbase`

Returns the client coinbase address.
**Parameters**
none
**Returns**
- `DATA`, 20 bytes - the current coinbase address.

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_coinbase",
  "params": [],
  "id": 64
}
```

<h3 id="coinbase-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[coinbaserequest](#schemacoinbaserequest)|true|none|

<h3 id="coinbase-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## gasPrice

<a id="opIdgasPrice"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/gasPrice \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_gasPrice","params":[],"id":73}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/gasPrice",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0', method: 'eth_gasPrice', params: [], id: 73 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/gasPrice"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_gasPrice\",\"params\":[],\"id\":73}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/gasPrice")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_gasPrice\",\"params\":[],\"id\":73}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_gasPrice\",\"params\":[],\"id\":73}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/gasPrice", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/gasPrice")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_gasPrice\",\"params\":[],\"id\":73}")
  .asString();
```

`POST /gasPrice`

Returns the current price per gas in wei.
**Parameters**
none
**Returns**
- `QUANTITY` - integer of the current gas price in wei.

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_gasPrice",
  "params": [],
  "id": 73
}
```

<h3 id="gasprice-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[gasPriceRequest](#schemagaspricerequest)|true|none|

<h3 id="gasprice-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## accounts

<a id="opIdaccounts"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/accounts \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_accounts","params":[],"id":1}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/accounts",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0', method: 'eth_accounts', params: [], id: 1 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/accounts"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_accounts\",\"params\":[],\"id\":1}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/accounts")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_accounts\",\"params\":[],\"id\":1}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_accounts\",\"params\":[],\"id\":1}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/accounts", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/accounts")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_accounts\",\"params\":[],\"id\":1}")
  .asString();
```

`POST /accounts`

Returns a list of addresses owned by client.

**Parameters**

none

**Returns**

- `Array of DATA`, 20 Bytes - addresses owned by the client

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_accounts",
  "params": [],
  "id": 1
}
```

<h3 id="accounts-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[accountsrequest](#schemaaccountsrequest)|true|none|

<h3 id="accounts-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## blockNumber

<a id="opIdblockNumber"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/blockNumber \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_blockNumber","params":[],"id":83}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/blockNumber",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0', method: 'eth_blockNumber', params: [], id: 83 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/blockNumber"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_blockNumber\",\"params\":[],\"id\":83}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/blockNumber")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_blockNumber\",\"params\":[],\"id\":83}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_blockNumber\",\"params\":[],\"id\":83}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/blockNumber", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/blockNumber")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_blockNumber\",\"params\":[],\"id\":83}")
  .asString();
```

`POST /blockNumber`

Returns the number of most recent block.
**Parameters**
none
**Returns**
- `QUANTITY` - integer of the current block number the client is on.

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_blockNumber",
  "params": [],
  "id": 83
}
```

<h3 id="blocknumber-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[blockNumberRequest](#schemablocknumberrequest)|true|none|

<h3 id="blocknumber-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## getBalance

<a id="opIdgetBalance"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/getBalance \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_getBalance","params":["0x2b5634c42055806a59e9107ed44d43c426e58258","latest"],"id":1}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/getBalance",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0',
  method: 'eth_getBalance',
  params: [ '0x2b5634c42055806a59e9107ed44d43c426e58258', 'latest' ],
  id: 1 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/getBalance"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBalance\",\"params\":[\"0x2b5634c42055806a59e9107ed44d43c426e58258\",\"latest\"],\"id\":1}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/getBalance")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBalance\",\"params\":[\"0x2b5634c42055806a59e9107ed44d43c426e58258\",\"latest\"],\"id\":1}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBalance\",\"params\":[\"0x2b5634c42055806a59e9107ed44d43c426e58258\",\"latest\"],\"id\":1}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/getBalance", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/getBalance")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBalance\",\"params\":[\"0x2b5634c42055806a59e9107ed44d43c426e58258\",\"latest\"],\"id\":1}")
  .asString();
```

`POST /getBalance`

Returns the balance of the account of given address.

**Parameters**

- `DATA`, 20 Bytes - address to check for balance.
- `QUANTITY|TAG` - integer block number, or the string "latest", "earliest" or "pending", see the default block parameter

      params: [
        ' 0x2b5634c42055806a59e9107ed44d43c426e58258',
        'latest'
      ]

**Returns**
- `QUANTITY` - integer of the current balance in wei.

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getBalance",
  "params": [
    "0x2b5634c42055806a59e9107ed44d43c426e58258",
    "latest"
  ],
  "id": 1
}
```

<h3 id="getbalance-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[getBalanceRequest](#schemagetbalancerequest)|true|none|

<h3 id="getbalance-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## getStorageAt

<a id="opIdgetStorageAt"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/getStorageAt \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_getStorageAt","params":["0x295a70b2de5e3953354a6a8344e616ed314d7251","0x0","latest"],"id":1}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/getStorageAt",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0',
  method: 'eth_getStorageAt',
  params: [ '0x295a70b2de5e3953354a6a8344e616ed314d7251', '0x0', 'latest' ],
  id: 1 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/getStorageAt"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getStorageAt\",\"params\":[\"0x295a70b2de5e3953354a6a8344e616ed314d7251\",\"0x0\",\"latest\"],\"id\":1}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/getStorageAt")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getStorageAt\",\"params\":[\"0x295a70b2de5e3953354a6a8344e616ed314d7251\",\"0x0\",\"latest\"],\"id\":1}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getStorageAt\",\"params\":[\"0x295a70b2de5e3953354a6a8344e616ed314d7251\",\"0x0\",\"latest\"],\"id\":1}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/getStorageAt", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/getStorageAt")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getStorageAt\",\"params\":[\"0x295a70b2de5e3953354a6a8344e616ed314d7251\",\"0x0\",\"latest\"],\"id\":1}")
  .asString();
```

`POST /getStorageAt`

Returns the balance of the account of given address.

**Parameters**

- `DATA`, 20 Bytes - address to check for balance.

- `QUANTITY|TAG` - integer block number, or the string "latest", "earliest" or "pending", see the default block parameter

      params: [
            '0x2b5634c42055806a59e9107ed44d43c426e58258',
            'latest'
            ]

**Returns**

- `QUANTITY` - integer of the current balance in wei.

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getStorageAt",
  "params": [
    "0x295a70b2de5e3953354a6a8344e616ed314d7251",
    "0x0",
    "latest"
  ],
  "id": 1
}
```

<h3 id="getstorageat-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[getStorageAtRequest](#schemagetstorageatrequest)|true|none|

<h3 id="getstorageat-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful Operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## getTransactionCount

<a id="opIdgetTransactionCount"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/getTransactionCount \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_getTransactionCount","params":["0xbf1dcb735e512b731abd3404c15df6431bd03d42","latest"],"id":1}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/getTransactionCount",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0',
  method: 'eth_getTransactionCount',
  params: [ '0xbf1dcb735e512b731abd3404c15df6431bd03d42', 'latest' ],
  id: 1 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/getTransactionCount"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getTransactionCount\",\"params\":[\"0xbf1dcb735e512b731abd3404c15df6431bd03d42\",\"latest\"],\"id\":1}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/getTransactionCount")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getTransactionCount\",\"params\":[\"0xbf1dcb735e512b731abd3404c15df6431bd03d42\",\"latest\"],\"id\":1}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getTransactionCount\",\"params\":[\"0xbf1dcb735e512b731abd3404c15df6431bd03d42\",\"latest\"],\"id\":1}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/getTransactionCount", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/getTransactionCount")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getTransactionCount\",\"params\":[\"0xbf1dcb735e512b731abd3404c15df6431bd03d42\",\"latest\"],\"id\":1}")
  .asString();
```

`POST /getTransactionCount`

Returns the number of transactions sent from an address.

**Parameters**

- `DATA`, 20 Bytes - address.
- `QUANTITY|TAG` - integer block number, or the string `"latest"`, `"earliest"` or `"pending"`, see the default block parameter

      params: [
        '0x407d73d8a49eeb85d32cf465507dd71d507100c1',
        'latest' // state at the latest block
      ]

**Returns**

- `QUANTITY` - integer of the number of transactions send from this address.

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getTransactionCount",
  "params": [
    "0xbf1dcb735e512b731abd3404c15df6431bd03d42",
    "latest"
  ],
  "id": 1
}
```

<h3 id="gettransactioncount-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[getTransactionCountRequest](#schemagettransactioncountrequest)|true|none|

<h3 id="gettransactioncount-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful Operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## getBlockTransactionCountByHash

<a id="opIdgetBlockTransactionCountByHash"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/getBlockTransactionCountByHash \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_getBlockTransactionCountByHash","params":["0xc8b967161c671ce952a3d50987a78d64157fb5a8e1724804b87d3e9b11e3aa34"],"id":1}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/getBlockTransactionCountByHash",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0',
  method: 'eth_getBlockTransactionCountByHash',
  params: 
   [ '0xc8b967161c671ce952a3d50987a78d64157fb5a8e1724804b87d3e9b11e3aa34' ],
  id: 1 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/getBlockTransactionCountByHash"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockTransactionCountByHash\",\"params\":[\"0xc8b967161c671ce952a3d50987a78d64157fb5a8e1724804b87d3e9b11e3aa34\"],\"id\":1}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/getBlockTransactionCountByHash")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockTransactionCountByHash\",\"params\":[\"0xc8b967161c671ce952a3d50987a78d64157fb5a8e1724804b87d3e9b11e3aa34\"],\"id\":1}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockTransactionCountByHash\",\"params\":[\"0xc8b967161c671ce952a3d50987a78d64157fb5a8e1724804b87d3e9b11e3aa34\"],\"id\":1}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/getBlockTransactionCountByHash", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/getBlockTransactionCountByHash")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockTransactionCountByHash\",\"params\":[\"0xc8b967161c671ce952a3d50987a78d64157fb5a8e1724804b87d3e9b11e3aa34\"],\"id\":1}")
  .asString();
```

`POST /getBlockTransactionCountByHash`

Returns the number of transactions in a block from a block matching the given block hash.

**Parameters**

- `DATA`, 32 Bytes - hash of a block

    params: [
      '0xc8b967161c671ce952a3d50987a78d64157fb5a8e1724804b87d3e9b11e3aa34'
    ]

**Returns**

- `QUANTITY` - integer of the number of transactions in this block.

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getBlockTransactionCountByHash",
  "params": [
    "0xc8b967161c671ce952a3d50987a78d64157fb5a8e1724804b87d3e9b11e3aa34"
  ],
  "id": 1
}
```

<h3 id="getblocktransactioncountbyhash-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[getBlockTransactionCountByHashRequest](#schemagetblocktransactioncountbyhashrequest)|true|none|

<h3 id="getblocktransactioncountbyhash-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful Operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## getBlockTransactionCountByNumber

<a id="opIdgetBlockTransactionCountByNumber"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/getBlockTransactionCountByNumber \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_getBlockTransactionCountByNumber","params":["0x52A8CA"],"id":1}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/getBlockTransactionCountByNumber",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0',
  method: 'eth_getBlockTransactionCountByNumber',
  params: [ '0x52A8CA' ],
  id: 1 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/getBlockTransactionCountByNumber"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockTransactionCountByNumber\",\"params\":[\"0x52A8CA\"],\"id\":1}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/getBlockTransactionCountByNumber")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockTransactionCountByNumber\",\"params\":[\"0x52A8CA\"],\"id\":1}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockTransactionCountByNumber\",\"params\":[\"0x52A8CA\"],\"id\":1}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/getBlockTransactionCountByNumber", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/getBlockTransactionCountByNumber")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockTransactionCountByNumber\",\"params\":[\"0x52A8CA\"],\"id\":1}")
  .asString();
```

`POST /getBlockTransactionCountByNumber`

Returns the number of transactions in a block matching the given block number.

**Parameters**

- `QUANTITY|TAG` - integer of a block number, or the string `"earliest"`, `"latest"` or `"pending"`, as in the default block parameter.

    params: [
      '0x85', // 232
    ]

**Returns**

- `QUANTITY` - integer of the number of transactions in this block.

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getBlockTransactionCountByNumber",
  "params": [
    "0x52A8CA"
  ],
  "id": 1
}
```

<h3 id="getblocktransactioncountbynumber-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[getBlockTransactionCountByNumberRequest](#schemagetblocktransactioncountbynumberrequest)|true|none|

<h3 id="getblocktransactioncountbynumber-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful Operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## getCode

<a id="opIdgetCode"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/getCode \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_getCode","params":["0xa94f5374fce5edbc8e2a8697c15331677e6ebf0b","0x2"],"id":1}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/getCode",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0',
  method: 'eth_getCode',
  params: [ '0xa94f5374fce5edbc8e2a8697c15331677e6ebf0b', '0x2' ],
  id: 1 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/getCode"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getCode\",\"params\":[\"0xa94f5374fce5edbc8e2a8697c15331677e6ebf0b\",\"0x2\"],\"id\":1}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/getCode")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getCode\",\"params\":[\"0xa94f5374fce5edbc8e2a8697c15331677e6ebf0b\",\"0x2\"],\"id\":1}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getCode\",\"params\":[\"0xa94f5374fce5edbc8e2a8697c15331677e6ebf0b\",\"0x2\"],\"id\":1}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/getCode", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/getCode")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getCode\",\"params\":[\"0xa94f5374fce5edbc8e2a8697c15331677e6ebf0b\",\"0x2\"],\"id\":1}")
  .asString();
```

`POST /getCode`

Returns code at a given address.

**Parameters**

- `DATA`, 20 Bytes - address

- `QUANTITY|TAG` - integer block number, or the string `"latest"`, `"earliest"` or `"pending"`, see the default block parameter

    params: [
      '0xa94f5374fce5edbc8e2a8697c15331677e6ebf0b',
      '0x2'  // 2
    ]

**Returns**

- `DATA` - the code from the given address.

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getCode",
  "params": [
    "0xa94f5374fce5edbc8e2a8697c15331677e6ebf0b",
    "0x2"
  ],
  "id": 1
}
```

<h3 id="getcode-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[getCodeRequest](#schemagetcoderequest)|true|none|

<h3 id="getcode-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## sign

<a id="opIdsign"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/sign \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_sign","params":["0x9b2055d370f73ec7d8a03e965129118dc8f5bf83","0xdeadbeaf"],"id":1}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/sign",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0',
  method: 'eth_sign',
  params: [ '0x9b2055d370f73ec7d8a03e965129118dc8f5bf83', '0xdeadbeaf' ],
  id: 1 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/sign"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_sign\",\"params\":[\"0x9b2055d370f73ec7d8a03e965129118dc8f5bf83\",\"0xdeadbeaf\"],\"id\":1}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/sign")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_sign\",\"params\":[\"0x9b2055d370f73ec7d8a03e965129118dc8f5bf83\",\"0xdeadbeaf\"],\"id\":1}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_sign\",\"params\":[\"0x9b2055d370f73ec7d8a03e965129118dc8f5bf83\",\"0xdeadbeaf\"],\"id\":1}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/sign", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/sign")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_sign\",\"params\":[\"0x9b2055d370f73ec7d8a03e965129118dc8f5bf83\",\"0xdeadbeaf\"],\"id\":1}")
  .asString();
```

`POST /sign`

The sign method calculates an Ethereum specific signature with: `sign(keccak256("\x19Ethereum Signed Message:\n" + len(message) + message)))`.

By adding a prefix to the message makes the calculated signature recognisable as an Ethereum specific signature.  This prevents misuse where a malicious DApp can sign arbitrary data (e.g. transaction) and use the signature to impersonate the victim.

**Note:** the address to sign with must be unlocked.

**Parameters**

  - `DATA`, 20 Bytes - address

  - `DATA`, N Bytes - message to sign

**Returns**

- `DATA`: Signature

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_sign",
  "params": [
    "0x9b2055d370f73ec7d8a03e965129118dc8f5bf83",
    "0xdeadbeaf"
  ],
  "id": 1
}
```

<h3 id="sign-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[signrequest](#schemasignrequest)|true|none|

<h3 id="sign-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful Operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## sendTransaction

<a id="opIdsendTransaction"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/sendTransaction \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_sendTransaction","params":[{"from":"0xb60e8dd61c5d32be8058bb8eb970870f07233155","to":"0xd46e8dd67c5d32be8058bb8eb970870f07244567","gas":"0x76c0","gasPrice":"0x9184e72a000","value":"0x9184e72a","data":"0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675"}],"id":1}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/sendTransaction",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0',
  method: 'eth_sendTransaction',
  params: 
   [ { from: '0xb60e8dd61c5d32be8058bb8eb970870f07233155',
       to: '0xd46e8dd67c5d32be8058bb8eb970870f07244567',
       gas: '0x76c0',
       gasPrice: '0x9184e72a000',
       value: '0x9184e72a',
       data: '0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675' } ],
  id: 1 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/sendTransaction"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_sendTransaction\",\"params\":[{\"from\":\"0xb60e8dd61c5d32be8058bb8eb970870f07233155\",\"to\":\"0xd46e8dd67c5d32be8058bb8eb970870f07244567\",\"gas\":\"0x76c0\",\"gasPrice\":\"0x9184e72a000\",\"value\":\"0x9184e72a\",\"data\":\"0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675\"}],\"id\":1}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/sendTransaction")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_sendTransaction\",\"params\":[{\"from\":\"0xb60e8dd61c5d32be8058bb8eb970870f07233155\",\"to\":\"0xd46e8dd67c5d32be8058bb8eb970870f07244567\",\"gas\":\"0x76c0\",\"gasPrice\":\"0x9184e72a000\",\"value\":\"0x9184e72a\",\"data\":\"0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675\"}],\"id\":1}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_sendTransaction\",\"params\":[{\"from\":\"0xb60e8dd61c5d32be8058bb8eb970870f07233155\",\"to\":\"0xd46e8dd67c5d32be8058bb8eb970870f07244567\",\"gas\":\"0x76c0\",\"gasPrice\":\"0x9184e72a000\",\"value\":\"0x9184e72a\",\"data\":\"0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675\"}],\"id\":1}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/sendTransaction", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/sendTransaction")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_sendTransaction\",\"params\":[{\"from\":\"0xb60e8dd61c5d32be8058bb8eb970870f07233155\",\"to\":\"0xd46e8dd67c5d32be8058bb8eb970870f07244567\",\"gas\":\"0x76c0\",\"gasPrice\":\"0x9184e72a000\",\"value\":\"0x9184e72a\",\"data\":\"0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675\"}],\"id\":1}")
  .asString();
```

`POST /sendTransaction`

Creates new message call transaction or a contract creation, if the data field contains code.

**Parameters**

`Object` - The transaction object

  - `from`: `DATA`, 20 Bytes - The address the transaction is send from.

  - `to`: `DATA`, 20 Bytes - (optional when creating new contract) The address the transaction is directed to.

  - `gas`: `QUANTITY` - (optional, default: 90000) Integer of the gas provided for the transaction execution. It will return unused gas.

  - `gasPrice`: `QUANTITY` - (optional, default: To-Be-Determined) Integer of the gasPrice used for each paid gas

  - `value`: `QUANTITY` - (optional) Integer of the value sent with this transaction

  - `data`: `DATA` - The compiled code of a contract OR the hash of the invoked method signature and encoded parameters. For details see Ethereum Contract ABI

  - `nonce`: `QUANTITY` - (optional) Integer of a nonce. This allows to overwrite your own pending transactions that use the same nonce.

    params: [{
      "from": " 0xb60e8dd61c5d32be8058bb8eb970870f07233155",
      "to": " 0xd46e8dd67c5d32be8058bb8eb970870f07244567",
      "gas": "0x76c0", // 30400
      "gasPrice": "0x9184e72a000", // 10000000000000
      "value": "0x9184e72a", // 2441406250
      "data": "0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675"
    }]

**Returns**
- `DATA`, 32 Bytes - the transaction hash, or the zero hash if the transaction is not yet available.

 Use `eth_getTransactionReceipt` to get the contract address, after the transaction was mined, when you created a contract.

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_sendTransaction",
  "params": [
    {
      "from": "0xb60e8dd61c5d32be8058bb8eb970870f07233155",
      "to": "0xd46e8dd67c5d32be8058bb8eb970870f07244567",
      "gas": "0x76c0",
      "gasPrice": "0x9184e72a000",
      "value": "0x9184e72a",
      "data": "0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675"
    }
  ],
  "id": 1
}
```

<h3 id="sendtransaction-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[sendTransactionRequest](#schemasendtransactionrequest)|true|none|

<h3 id="sendtransaction-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful Operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## sendRawTransaction

<a id="opIdsendRawTransaction"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/sendRawTransaction \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_sendRawTransaction","params":["0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675"],"id":1}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/sendRawTransaction",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0',
  method: 'eth_sendRawTransaction',
  params: 
   [ '0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675' ],
  id: 1 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/sendRawTransaction"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_sendRawTransaction\",\"params\":[\"0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675\"],\"id\":1}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/sendRawTransaction")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_sendRawTransaction\",\"params\":[\"0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675\"],\"id\":1}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_sendRawTransaction\",\"params\":[\"0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675\"],\"id\":1}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/sendRawTransaction", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/sendRawTransaction")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_sendRawTransaction\",\"params\":[\"0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675\"],\"id\":1}")
  .asString();
```

`POST /sendRawTransaction`

Creates new message call transaction or a contract creation for signed transactions.

**Parameters**

- `DATA`, The signed transaction data.

    params: ["0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675"]

**Returns**

- `DATA`, 32 Bytes - the transaction hash, or the zero hash if the transaction is not yet available.

Use `eth_getTransactionReceipt` to get the contract address, after the transaction was mined, when you created a contract.

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_sendRawTransaction",
  "params": [
    "0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675"
  ],
  "id": 1
}
```

<h3 id="sendrawtransaction-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[sendRawTransactionRequest](#schemasendrawtransactionrequest)|true|none|

<h3 id="sendrawtransaction-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful Operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## call

<a id="opIdcall"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/call \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_call","params":[{"from":"0xb60e8dd61c5d32be8058bb8eb970870f07233155","to":"0xd46e8dd67c5d32be8058bb8eb970870f07244567","gas":"0x76c0","gasPrice":"0x9184e72a000","value":"0x9184e72a","data":"0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675"},"latest"],"id":1}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/call",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0',
  method: 'eth_call',
  params: 
   [ { from: '0xb60e8dd61c5d32be8058bb8eb970870f07233155',
       to: '0xd46e8dd67c5d32be8058bb8eb970870f07244567',
       gas: '0x76c0',
       gasPrice: '0x9184e72a000',
       value: '0x9184e72a',
       data: '0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675' },
     'latest' ],
  id: 1 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/call"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_call\",\"params\":[{\"from\":\"0xb60e8dd61c5d32be8058bb8eb970870f07233155\",\"to\":\"0xd46e8dd67c5d32be8058bb8eb970870f07244567\",\"gas\":\"0x76c0\",\"gasPrice\":\"0x9184e72a000\",\"value\":\"0x9184e72a\",\"data\":\"0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675\"},\"latest\"],\"id\":1}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/call")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_call\",\"params\":[{\"from\":\"0xb60e8dd61c5d32be8058bb8eb970870f07233155\",\"to\":\"0xd46e8dd67c5d32be8058bb8eb970870f07244567\",\"gas\":\"0x76c0\",\"gasPrice\":\"0x9184e72a000\",\"value\":\"0x9184e72a\",\"data\":\"0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675\"},\"latest\"],\"id\":1}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_call\",\"params\":[{\"from\":\"0xb60e8dd61c5d32be8058bb8eb970870f07233155\",\"to\":\"0xd46e8dd67c5d32be8058bb8eb970870f07244567\",\"gas\":\"0x76c0\",\"gasPrice\":\"0x9184e72a000\",\"value\":\"0x9184e72a\",\"data\":\"0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675\"},\"latest\"],\"id\":1}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/call", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/call")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_call\",\"params\":[{\"from\":\"0xb60e8dd61c5d32be8058bb8eb970870f07233155\",\"to\":\"0xd46e8dd67c5d32be8058bb8eb970870f07244567\",\"gas\":\"0x76c0\",\"gasPrice\":\"0x9184e72a000\",\"value\":\"0x9184e72a\",\"data\":\"0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675\"},\"latest\"],\"id\":1}")
  .asString();
```

`POST /call`

Executes a new message call immediately without creating a transaction on the block chain.

**Parameters**

`Object` [required]- The transaction call object

  - `from`: `DATA`, 20 Bytes - (optional) The address the transaction is sent from.

  - `to`: `DATA`, 20 Bytes - The address the transaction is directed to.

  - `gas`: `QUANTITY` - (optional) Integer of the gas provided for the transaction execution. eth_call consumes zero gas, but this parameter may be needed by some executions.

  - `gasPrice`: `QUANTITY` - (optional) Integer of the gasPrice used for each paid gas

  - `value`: `QUANTITY` - (optional) Integer of the value sent with this transaction

  - `data`: `DATA` - (optional) Hash of the method signature and encoded parameters. For details see Ethereum Contract ABI

  - `QUANTITY|TAG` - integer block number, or the string `"latest"`, `"earliest"` or `"pending"`, see the default block parameter

**Returns**
- `DATA` - the return value of executed contract.

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_call",
  "params": [
    {
      "from": "0xb60e8dd61c5d32be8058bb8eb970870f07233155",
      "to": "0xd46e8dd67c5d32be8058bb8eb970870f07244567",
      "gas": "0x76c0",
      "gasPrice": "0x9184e72a000",
      "value": "0x9184e72a",
      "data": "0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675"
    },
    "latest"
  ],
  "id": 1
}
```

<h3 id="call-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[callrequest](#schemacallrequest)|true|none|

<h3 id="call-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful Operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## estimateGas

<a id="opIdestimateGas"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/estimateGas \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_estimateGas","params":[{"from":"0xb60e8dd61c5d32be8058bb8eb970870f07233155","to":"0xd46e8dd67c5d32be8058bb8eb970870f07244567","gas":"0x76c0","gasPrice":"0x9184e72a000","value":"0x9184e72a","data":"0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675"}],"id":1}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/estimateGas",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0',
  method: 'eth_estimateGas',
  params: 
   [ { from: '0xb60e8dd61c5d32be8058bb8eb970870f07233155',
       to: '0xd46e8dd67c5d32be8058bb8eb970870f07244567',
       gas: '0x76c0',
       gasPrice: '0x9184e72a000',
       value: '0x9184e72a',
       data: '0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675' } ],
  id: 1 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/estimateGas"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_estimateGas\",\"params\":[{\"from\":\"0xb60e8dd61c5d32be8058bb8eb970870f07233155\",\"to\":\"0xd46e8dd67c5d32be8058bb8eb970870f07244567\",\"gas\":\"0x76c0\",\"gasPrice\":\"0x9184e72a000\",\"value\":\"0x9184e72a\",\"data\":\"0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675\"}],\"id\":1}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/estimateGas")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_estimateGas\",\"params\":[{\"from\":\"0xb60e8dd61c5d32be8058bb8eb970870f07233155\",\"to\":\"0xd46e8dd67c5d32be8058bb8eb970870f07244567\",\"gas\":\"0x76c0\",\"gasPrice\":\"0x9184e72a000\",\"value\":\"0x9184e72a\",\"data\":\"0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675\"}],\"id\":1}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_estimateGas\",\"params\":[{\"from\":\"0xb60e8dd61c5d32be8058bb8eb970870f07233155\",\"to\":\"0xd46e8dd67c5d32be8058bb8eb970870f07244567\",\"gas\":\"0x76c0\",\"gasPrice\":\"0x9184e72a000\",\"value\":\"0x9184e72a\",\"data\":\"0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675\"}],\"id\":1}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/estimateGas", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/estimateGas")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_estimateGas\",\"params\":[{\"from\":\"0xb60e8dd61c5d32be8058bb8eb970870f07233155\",\"to\":\"0xd46e8dd67c5d32be8058bb8eb970870f07244567\",\"gas\":\"0x76c0\",\"gasPrice\":\"0x9184e72a000\",\"value\":\"0x9184e72a\",\"data\":\"0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675\"}],\"id\":1}")
  .asString();
```

`POST /estimateGas`

Generates and returns an estimate of how much gas is necessary to allow the transaction to complete.  The transaction will not be added to the blockchain. Note that the estimate may be significantly more  than the amount of gas actually used by the transaction, for a variety of reasons including EVM mechanics and node performance.

**Parameters**

See `eth_call` parameters, expect that all properties are optional. If no gas limit is specified geth uses  the block gas limit from the pending block as an upper bound. As a result the returned estimate might not be  enough to executed the call/transaction when the amount of gas is higher than the pending block gas limit.

**Returns**
- `QUANTITY` - the amount of gas used.

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_estimateGas",
  "params": [
    {
      "from": "0xb60e8dd61c5d32be8058bb8eb970870f07233155",
      "to": "0xd46e8dd67c5d32be8058bb8eb970870f07244567",
      "gas": "0x76c0",
      "gasPrice": "0x9184e72a000",
      "value": "0x9184e72a",
      "data": "0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675"
    }
  ],
  "id": 1
}
```

<h3 id="estimategas-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[estimateGasRequest](#schemaestimategasrequest)|true|none|

<h3 id="estimategas-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful Operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## getBlockByHash

<a id="opIdgetBlockByHash"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/getBlockByHash \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_getBlockByHash","params":["0x9326145f8a2c8c00bbe13afc7d7f3d9c868b5ef39d89f2f4e9390e9720298624",true],"id":1}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/getBlockByHash",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0',
  method: 'eth_getBlockByHash',
  params: 
   [ '0x9326145f8a2c8c00bbe13afc7d7f3d9c868b5ef39d89f2f4e9390e9720298624',
     true ],
  id: 1 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/getBlockByHash"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockByHash\",\"params\":[\"0x9326145f8a2c8c00bbe13afc7d7f3d9c868b5ef39d89f2f4e9390e9720298624\",true],\"id\":1}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/getBlockByHash")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockByHash\",\"params\":[\"0x9326145f8a2c8c00bbe13afc7d7f3d9c868b5ef39d89f2f4e9390e9720298624\",true],\"id\":1}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockByHash\",\"params\":[\"0x9326145f8a2c8c00bbe13afc7d7f3d9c868b5ef39d89f2f4e9390e9720298624\",true],\"id\":1}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/getBlockByHash", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/getBlockByHash")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockByHash\",\"params\":[\"0x9326145f8a2c8c00bbe13afc7d7f3d9c868b5ef39d89f2f4e9390e9720298624\",true],\"id\":1}")
  .asString();
```

`POST /getBlockByHash`

Returns information about a block by hash.

**Parameters**

- `BLOCKHASH` [required] - a string representing a BLOCKHASH
- `Boolean` [required] - If true it returns the full transaction objects, if false only the hashes of the transactions.

    params: [
      '0x9326145f8a2c8c00bbe13afc7d7f3d9c868b5ef39d89f2f4e9390e9720298624',
      true
    ]

**Returns**
`Object` - A block object, or null when no block was found:

  - `number`: `QUANTITY` - the block number. null when its pending block.

  - `hash`: `DATA`, 32 Bytes - hash of the block. `null` when its pending block.

  - `parentHash`: `DATA`, 32 Bytes - hash of the parent block.

  - `nonce`: `DATA`, 8 Bytes - hash of the generated proof-of-work. `null` when its pending block.

  - `sha3Uncles`: `DATA`, 32 Bytes - SHA3 of the uncles data in the block.

  - `logsBloom`: `DATA`, 256 Bytes - the bloom filter for the logs of the block. `null` when its pending block.

  - `transactionsRoot`: `DATA`, 32 Bytes - the root of the transaction trie of the block.

  - `stateRoot`: `DATA`, 32 Bytes - the root of the final state trie of the block.

  - `receiptsRoot`: `DATA`, 32 Bytes - the root of the receipts trie of the block.

  - `miner`: `DATA`, 20 Bytes - the address of the beneficiary to whom the mining rewards were given.

  - `difficulty`: `QUANTITY` - integer of the difficulty for this block.

  - `totalDifficulty`: `QUANTITY` - integer of the total difficulty of the chain until this block.

  - `extraData`: `DATA` - the "extra data" field of this block.

  - `size`: `QUANTITY` - integer the size of this block in bytes.

  - `gasLimit`: `QUANTITY` - the maximum gas allowed in this block.

  - `gasUsed`: `QUANTITY` - the total used gas by all transactions in this block.

  - `timestamp`: `QUANTITY` - the unix timestamp for when the block was collated.

  - `transactions`: `Array` - Array of transaction objects, or 32 Bytes transaction hashes depending on the last given parameter.

  - `uncles`: `Array` - Array of uncle hashes.

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getBlockByHash",
  "params": [
    "0x9326145f8a2c8c00bbe13afc7d7f3d9c868b5ef39d89f2f4e9390e9720298624",
    true
  ],
  "id": 1
}
```

<h3 id="getblockbyhash-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[getBlockByHashRequest](#schemagetblockbyhashrequest)|true|none|

<h3 id="getblockbyhash-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful Operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## getBlockByNumber

<a id="opIdgetBlockByNumber"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/getBlockByNumber \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_getBlockByNumber","params":["0x0",true],"id":1}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/getBlockByNumber",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0',
  method: 'eth_getBlockByNumber',
  params: [ '0x0', true ],
  id: 1 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/getBlockByNumber"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockByNumber\",\"params\":[\"0x0\",true],\"id\":1}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/getBlockByNumber")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockByNumber\",\"params\":[\"0x0\",true],\"id\":1}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockByNumber\",\"params\":[\"0x0\",true],\"id\":1}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/getBlockByNumber", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/getBlockByNumber")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockByNumber\",\"params\":[\"0x0\",true],\"id\":1}")
  .asString();
```

`POST /getBlockByNumber`

Returns information about a block by block number.

**Parameters**

`BLOCKNUMBER` [required] - a hex code of an integer representing the BLOCKNUMBER or one of the following special params:
  
  - `latest`: get block data of the latest block

  - `pending`: get block data of pending block

  - `earliest`: get the genesis block

`FULLTX` [required] - a boolean value specified whether you want to get transactions list or not

    params: [
      '0x0',
      true
    ]

**Returns**

- `RETURN VALUE` - block data of the given `BLOCKNUMBER`

See `eth_getBlockByHash`

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getBlockByNumber",
  "params": [
    "0x0",
    true
  ],
  "id": 1
}
```

<h3 id="getblockbynumber-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[getBlockByNumberRequest](#schemagetblockbynumberrequest)|true|none|

<h3 id="getblockbynumber-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful Operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## getBlockSignersByNumber

<a id="opIdgetBlockSignersByNumber"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/getBlockSignersByNumber \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_getBlockSignersByNumber","params":["0xA61F98"],"id":1}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/getBlockSignersByNumber",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0',
  method: 'eth_getBlockSignersByNumber',
  params: [ '0xA61F98' ],
  id: 1 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/getBlockSignersByNumber"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockSignersByNumber\",\"params\":[\"0xA61F98\"],\"id\":1}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/getBlockSignersByNumber")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockSignersByNumber\",\"params\":[\"0xA61F98\"],\"id\":1}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockSignersByNumber\",\"params\":[\"0xA61F98\"],\"id\":1}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/getBlockSignersByNumber", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/getBlockSignersByNumber")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockSignersByNumber\",\"params\":[\"0xA61F98\"],\"id\":1}")
  .asString();
```

`POST /getBlockSignersByNumber`

Returns the signers set of the block of given `BLOCKNUMBER`.

**Parameters**

`BLOCKNUMBER` [required] - a hex code of an integer representing the `BLOCKNUMBER` or one of the following special params:
  
  - `latest`: get block data of the latest block

  - `pending`: get block data of pending block

  - `earliest`: get the genesis block

    params: [
      '0xA61F98'
    ]

**Returns**

- `SIGNERS` - signers set of the block of given `BLOCKNUMBER`

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getBlockSignersByNumber",
  "params": [
    "0xA61F98"
  ],
  "id": 1
}
```

<h3 id="getblocksignersbynumber-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[getBlockSignersByNumberRequest](#schemagetblocksignersbynumberrequest)|true|none|

<h3 id="getblocksignersbynumber-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful Operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## getBlockSignersByHash

<a id="opIdgetBlockSignersByHash"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/getBlockSignersByHash \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_getBlockSignersByHash","params":["0x605777ee60ef3ccf21e079fa1b091b0196cf1a2c1dd7c088dd5b1ab03f680b6f"],"id":1}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/getBlockSignersByHash",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0',
  method: 'eth_getBlockSignersByHash',
  params: 
   [ '0x605777ee60ef3ccf21e079fa1b091b0196cf1a2c1dd7c088dd5b1ab03f680b6f' ],
  id: 1 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/getBlockSignersByHash"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockSignersByHash\",\"params\":[\"0x605777ee60ef3ccf21e079fa1b091b0196cf1a2c1dd7c088dd5b1ab03f680b6f\"],\"id\":1}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/getBlockSignersByHash")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockSignersByHash\",\"params\":[\"0x605777ee60ef3ccf21e079fa1b091b0196cf1a2c1dd7c088dd5b1ab03f680b6f\"],\"id\":1}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockSignersByHash\",\"params\":[\"0x605777ee60ef3ccf21e079fa1b091b0196cf1a2c1dd7c088dd5b1ab03f680b6f\"],\"id\":1}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/getBlockSignersByHash", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/getBlockSignersByHash")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockSignersByHash\",\"params\":[\"0x605777ee60ef3ccf21e079fa1b091b0196cf1a2c1dd7c088dd5b1ab03f680b6f\"],\"id\":1}")
  .asString();
```

`POST /getBlockSignersByHash`

Returns the signers set of the block of given `BLOCKHASH`.

**Parameters**

- `BLOCKHASH` [required] - a string representing a `BLOCKHASH`

    params: [
      '0x605777ee60ef3ccf21e079fa1b091b0196cf1a2c1dd7c088dd5b1ab03f680b6f'
    ]

**Returns**

- `SIGNERS` - signers set of the block of given `BLOCKHASH`

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getBlockSignersByHash",
  "params": [
    "0x605777ee60ef3ccf21e079fa1b091b0196cf1a2c1dd7c088dd5b1ab03f680b6f"
  ],
  "id": 1
}
```

<h3 id="getblocksignersbyhash-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[getBlockSignersByHashRequest](#schemagetblocksignersbyhashrequest)|true|none|

<h3 id="getblocksignersbyhash-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful Operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## getBlockFinalityByNumber

<a id="opIdgetBlockFinalityByNumber"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/getBlockFinalityByNumber \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_getBlockFinalityByNumber","params":["0xA61F98"],"id":1}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/getBlockFinalityByNumber",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0',
  method: 'eth_getBlockFinalityByNumber',
  params: [ '0xA61F98' ],
  id: 1 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/getBlockFinalityByNumber"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockFinalityByNumber\",\"params\":[\"0xA61F98\"],\"id\":1}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/getBlockFinalityByNumber")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockFinalityByNumber\",\"params\":[\"0xA61F98\"],\"id\":1}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockFinalityByNumber\",\"params\":[\"0xA61F98\"],\"id\":1}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/getBlockFinalityByNumber", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/getBlockFinalityByNumber")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockFinalityByNumber\",\"params\":[\"0xA61F98\"],\"id\":1}")
  .asString();
```

`POST /getBlockFinalityByNumber`

Returns the the finality of the block of given BLOCKNUMBER.

**Parameters**

- `BLOCKNUMBER` [required] - a hex code of an integer representing the `BLOCKNUMBER` or one of the following special params:

  - `latest`: get block data of the latest block

  - `pending`: get block data of pending block

  - `earliest`: get the genesis block

    params: [
      '0xA61F98'
    ]

**Returns**

- `BLOCK_FINALITY` - integer of the the finality of the block of given `BLOCKNUMBER`.

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getBlockFinalityByNumber",
  "params": [
    "0xA61F98"
  ],
  "id": 1
}
```

<h3 id="getblockfinalitybynumber-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[getBlockFinalityByNumberRequest](#schemagetblockfinalitybynumberrequest)|true|none|

<h3 id="getblockfinalitybynumber-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful Operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## getBlockFinalityByHash

<a id="opIdgetBlockFinalityByHash"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/getBlockFinalityByHash \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_getBlockFinalityByHash","params":["0x605777ee60ef3ccf21e079fa1b091b0196cf1a2c1dd7c088dd5b1ab03f680b6f"],"id":1}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/getBlockFinalityByHash",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0',
  method: 'eth_getBlockFinalityByHash',
  params: 
   [ '0x605777ee60ef3ccf21e079fa1b091b0196cf1a2c1dd7c088dd5b1ab03f680b6f' ],
  id: 1 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/getBlockFinalityByHash"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockFinalityByHash\",\"params\":[\"0x605777ee60ef3ccf21e079fa1b091b0196cf1a2c1dd7c088dd5b1ab03f680b6f\"],\"id\":1}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/getBlockFinalityByHash")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockFinalityByHash\",\"params\":[\"0x605777ee60ef3ccf21e079fa1b091b0196cf1a2c1dd7c088dd5b1ab03f680b6f\"],\"id\":1}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockFinalityByHash\",\"params\":[\"0x605777ee60ef3ccf21e079fa1b091b0196cf1a2c1dd7c088dd5b1ab03f680b6f\"],\"id\":1}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/getBlockFinalityByHash", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/getBlockFinalityByHash")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getBlockFinalityByHash\",\"params\":[\"0x605777ee60ef3ccf21e079fa1b091b0196cf1a2c1dd7c088dd5b1ab03f680b6f\"],\"id\":1}")
  .asString();
```

`POST /getBlockFinalityByHash`

Returns the the finality of the block of given `BLOCKHASH`.

**Parameters**

`BLOCKHASH` [required] - a string representing a `BLOCKHASH`

    params: [
      '0x605777ee60ef3ccf21e079fa1b091b0196cf1a2c1dd7c088dd5b1ab03f680b6f'
    ]

**Returns**

- `BLOCK_FINALITY` - integer of the the finality of the block of given `BLOCKHASH`.

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getBlockFinalityByHash",
  "params": [
    "0x605777ee60ef3ccf21e079fa1b091b0196cf1a2c1dd7c088dd5b1ab03f680b6f"
  ],
  "id": 1
}
```

<h3 id="getblockfinalitybyhash-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[getBlockFinalityByHashRequest](#schemagetblockfinalitybyhashrequest)|true|none|

<h3 id="getblockfinalitybyhash-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful Operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## getCandidates

<a id="opIdgetCandidates"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/getCandidates \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_getCandidates","params":["latest"],"id":1}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/getCandidates",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0',
  method: 'eth_getCandidates',
  params: [ 'latest' ],
  id: 1 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/getCandidates"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getCandidates\",\"params\":[\"latest\"],\"id\":1}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/getCandidates")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getCandidates\",\"params\":[\"latest\"],\"id\":1}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getCandidates\",\"params\":[\"latest\"],\"id\":1}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/getCandidates", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/getCandidates")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getCandidates\",\"params\":[\"latest\"],\"id\":1}")
  .asString();
```

`POST /getCandidates`

Returns the statuses of all candidates at a specific epoch

**Parameters**

  - `EPOCH_NUMBER` [required] - a hex code of an integer representing the `EPOCH_NUMBER` or the following special param:

      - `latest`: get the status of candidate at the current time

      params: [
        'latest'
      ]

**Returns**

  - `EPOCH` - the epoch number of the query of this request

  - `CANDIDATES` - list of candidates along with their statuses and capacities

      - `STATUS` - a string representing status of the corresponding candidate

      - `MASTERNODE` - if the candidate is a masternode
      
      - `SLASHED` - if the candidate is slashed

      - `PROPOSED` - if the candidate is proposed, have not been a masternode yet

      - `empty string` - if it's not a candidate

  - `CAPACITY` - capacity of the corresponding candidate

  - `SUCCESS` - true if the request is successful, otherwise it's false

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getCandidates",
  "params": [
    "latest"
  ],
  "id": 1
}
```

<h3 id="getcandidates-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[getCandidatesRequest](#schemagetcandidatesrequest)|true|none|

<h3 id="getcandidates-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful Operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## getCandidateStatus

<a id="opIdgetCandidateStatus"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/getCandidateStatus \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_getCandidateStatus","params":["0x1d50df657b6dce50bac634bf18e2d986d807e940","latest"],"id":1}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/getCandidateStatus",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0',
  method: 'eth_getCandidateStatus',
  params: [ '0x1d50df657b6dce50bac634bf18e2d986d807e940', 'latest' ],
  id: 1 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/getCandidateStatus"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getCandidateStatus\",\"params\":[\"0x1d50df657b6dce50bac634bf18e2d986d807e940\",\"latest\"],\"id\":1}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/getCandidateStatus")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getCandidateStatus\",\"params\":[\"0x1d50df657b6dce50bac634bf18e2d986d807e940\",\"latest\"],\"id\":1}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getCandidateStatus\",\"params\":[\"0x1d50df657b6dce50bac634bf18e2d986d807e940\",\"latest\"],\"id\":1}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/getCandidateStatus", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/getCandidateStatus")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getCandidateStatus\",\"params\":[\"0x1d50df657b6dce50bac634bf18e2d986d807e940\",\"latest\"],\"id\":1}")
  .asString();
```

`POST /getCandidateStatus`

Returns the status of the candidate of given `COINBASE_ADDRESS` at a specific epoch

**Parameters**

  - `COINBASE_ADDRESS` [required] - a string representing a `COINBASE_ADDRESS` (length: 40, start with 0x )

  - `EPOCH_NUMBER` [required] - a hex code of an integer representing the `EPOCH_NUMBER` or the following special param:

      - `latest`: get the status of candidate at the current time

      params: [
        '0x1d50df657b6dce50bac634bf18e2d986d807e940',
        'latest'
      ]

  
**Returns**

  - `STATUS` - a string representing status of the candicate of given `COINBASE_ADDRESS`

      - `MASTERNODE` - if the candidate is a masternode

      - `SLASHED` - if the candidate is slashed

      - `PROPOSED` - if the candidate is proposed, have not been a masternode yet

      - `empty string` - if it's not a candidate

  - `CAPACITY` - capacity of the candidate

  - `EPOCH` - the epoch number of the query of this request

  - `SUCCESS` - true if the request is successful, otherwise it's false

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getCandidateStatus",
  "params": [
    "0x1d50df657b6dce50bac634bf18e2d986d807e940",
    "latest"
  ],
  "id": 1
}
```

<h3 id="getcandidatestatus-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[getCandidateStatusRequest](#schemagetcandidatestatusrequest)|true|none|

<h3 id="getcandidatestatus-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful Operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## getTransactionByHash

<a id="opIdgetTransactionByHash"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/getTransactionByHash \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_getTransactionByHash","params":["0xd83b26e101dd6480764bade90fc283407919f60b7e65ff83fbf6cdc92f1138a1"],"id":1}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/getTransactionByHash",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0',
  method: 'eth_getTransactionByHash',
  params: 
   [ '0xd83b26e101dd6480764bade90fc283407919f60b7e65ff83fbf6cdc92f1138a1' ],
  id: 1 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/getTransactionByHash"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getTransactionByHash\",\"params\":[\"0xd83b26e101dd6480764bade90fc283407919f60b7e65ff83fbf6cdc92f1138a1\"],\"id\":1}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/getTransactionByHash")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getTransactionByHash\",\"params\":[\"0xd83b26e101dd6480764bade90fc283407919f60b7e65ff83fbf6cdc92f1138a1\"],\"id\":1}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getTransactionByHash\",\"params\":[\"0xd83b26e101dd6480764bade90fc283407919f60b7e65ff83fbf6cdc92f1138a1\"],\"id\":1}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/getTransactionByHash", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/getTransactionByHash")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getTransactionByHash\",\"params\":[\"0xd83b26e101dd6480764bade90fc283407919f60b7e65ff83fbf6cdc92f1138a1\"],\"id\":1}")
  .asString();
```

`POST /getTransactionByHash`

Returns the information about a transaction requested by transaction hash.

**Parameters**

- `DATA`, 32 Bytes - hash of a transaction

    params: [
      "0xd83b26e101dd6480764bade90fc283407919f60b7e65ff83fbf6cdc92f1138a1"
    ]

**Returns**

`Object` - A transaction object, or null when no transaction was found:

  - `hash`: `DATA`, 32 Bytes - hash of the transaction.

  - `nonce`: `QUANTITY` - the number of transactions made by the sender prior to this one.

  - `blockHash`: `DATA`, 32 Bytes - hash of the block where this transaction was in. `null` when its pending.

  - `blockNumber`: `QUANTITY` - block number where this transaction was in. `null` when its pending.

  - `transactionIndex`: `QUANTITY` - integer of the transactions index position in the block. `null` when its pending.

  - `from`: `DATA`, 20 Bytes - address of the sender.

  - `to`: `DATA`, 20 Bytes - address of the receiver. `null` when its a contract creation transaction.

  - `value`: `QUANTITY` - value transferred in Wei.

  - `gasPrice`: `QUANTITY` - gas price provided by the sender in Wei.

  - `gas`: `QUANTITY` - gas provided by the sender.

  - `input`: `DATA` - the data send along with the transaction.

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getTransactionByHash",
  "params": [
    "0xd83b26e101dd6480764bade90fc283407919f60b7e65ff83fbf6cdc92f1138a1"
  ],
  "id": 1
}
```

<h3 id="gettransactionbyhash-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[getTransactionByHashRequest](#schemagettransactionbyhashrequest)|true|none|

<h3 id="gettransactionbyhash-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful Operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## getTransactionByBlockHashAndIndex

<a id="opIdgetTransactionByBlockHashAndIndex"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/getTransactionByBlockHashAndIndex \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_getTransactionByBlockHashAndIndex","params":["0x3c82bc62179602b67318c013c10f99011037c49cba84e31ffe6e465a21c521a7","0x0"],"id":1}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/getTransactionByBlockHashAndIndex",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0',
  method: 'eth_getTransactionByBlockHashAndIndex',
  params: 
   [ '0x3c82bc62179602b67318c013c10f99011037c49cba84e31ffe6e465a21c521a7',
     '0x0' ],
  id: 1 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/getTransactionByBlockHashAndIndex"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getTransactionByBlockHashAndIndex\",\"params\":[\"0x3c82bc62179602b67318c013c10f99011037c49cba84e31ffe6e465a21c521a7\",\"0x0\"],\"id\":1}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/getTransactionByBlockHashAndIndex")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getTransactionByBlockHashAndIndex\",\"params\":[\"0x3c82bc62179602b67318c013c10f99011037c49cba84e31ffe6e465a21c521a7\",\"0x0\"],\"id\":1}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getTransactionByBlockHashAndIndex\",\"params\":[\"0x3c82bc62179602b67318c013c10f99011037c49cba84e31ffe6e465a21c521a7\",\"0x0\"],\"id\":1}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/getTransactionByBlockHashAndIndex", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/getTransactionByBlockHashAndIndex")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getTransactionByBlockHashAndIndex\",\"params\":[\"0x3c82bc62179602b67318c013c10f99011037c49cba84e31ffe6e465a21c521a7\",\"0x0\"],\"id\":1}")
  .asString();
```

`POST /getTransactionByBlockHashAndIndex`

Returns information about a transaction by block hash and transaction index position.
**Parameters**

- `DATA`, 32 Bytes - hash of a block.
- `QUANTITY` - integer of the transaction index position.

    params: [
      '0x3c82bc62179602b67318c013c10f99011037c49cba84e31ffe6e465a21c521a7',
      '0x0' // 0
    ]

**Returns**
See `eth_getTransactionByHash`

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getTransactionByBlockHashAndIndex",
  "params": [
    "0x3c82bc62179602b67318c013c10f99011037c49cba84e31ffe6e465a21c521a7",
    "0x0"
  ],
  "id": 1
}
```

<h3 id="gettransactionbyblockhashandindex-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[getTransactionByBlockHashAndIndexRequest](#schemagettransactionbyblockhashandindexrequest)|true|none|

<h3 id="gettransactionbyblockhashandindex-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful Operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## getTransactionByBlockNumberAndIndex

<a id="opIdgetTransactionByBlockNumberAndIndex"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/getTransactionByBlockNumberAndIndex \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_getTransactionByBlockNumberAndIndex","params":["0x52A96E","0x1"],"id":1}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/getTransactionByBlockNumberAndIndex",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0',
  method: 'eth_getTransactionByBlockNumberAndIndex',
  params: [ '0x52A96E', '0x1' ],
  id: 1 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/getTransactionByBlockNumberAndIndex"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getTransactionByBlockNumberAndIndex\",\"params\":[\"0x52A96E\",\"0x1\"],\"id\":1}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/getTransactionByBlockNumberAndIndex")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getTransactionByBlockNumberAndIndex\",\"params\":[\"0x52A96E\",\"0x1\"],\"id\":1}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getTransactionByBlockNumberAndIndex\",\"params\":[\"0x52A96E\",\"0x1\"],\"id\":1}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/getTransactionByBlockNumberAndIndex", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/getTransactionByBlockNumberAndIndex")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getTransactionByBlockNumberAndIndex\",\"params\":[\"0x52A96E\",\"0x1\"],\"id\":1}")
  .asString();
```

`POST /getTransactionByBlockNumberAndIndex`

Returns information about a transaction by block number and transaction index position.

**Parameters**

- `QUANTITY|TAG` - a block number, or the string `"earliest"`, `"latest"` or `"pending"`, as in the default block parameter.
- `QUANTITY` - the transaction index position.

    params: [
      '0x29c', // 668
      '0x0' // 0
    ]

**Returns**

See `eth_getTransactionByHash`

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getTransactionByBlockNumberAndIndex",
  "params": [
    "0x52A96E",
    "0x1"
  ],
  "id": 1
}
```

<h3 id="gettransactionbyblocknumberandindex-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[getTransactionByBlockNumberAndIndexRequest](#schemagettransactionbyblocknumberandindexrequest)|true|none|

<h3 id="gettransactionbyblocknumberandindex-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful Operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

## getTransactionReceipt

<a id="opIdgetTransactionReceipt"></a>

> Code samples

```shell
curl --request POST \
  --url https://rpc.xinfin.network/getTransactionReceipt \
  --header 'content-type: application/json' \
  --data '{"jsonrpc":"2.0","method":"eth_getTransactionReceipt","params":["0xa3ece39ae137617669c6933b7578b94e705e765683f260fcfe30eaa41932610f"],"id":1}'
```

```node
var http = require("https");

var options = {
  "method": "POST",
  "hostname": "rpc.xinfin.network",
  "port": null,
  "path": "/getTransactionReceipt",
  "headers": {
    "content-type": "application/json"
  }
};

var req = http.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({ jsonrpc: '2.0',
  method: 'eth_getTransactionReceipt',
  params: 
   [ '0xa3ece39ae137617669c6933b7578b94e705e765683f260fcfe30eaa41932610f' ],
  id: 1 }));
req.end();
```

```go
package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://rpc.xinfin.network/getTransactionReceipt"

	payload := strings.NewReader("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getTransactionReceipt\",\"params\":[\"0xa3ece39ae137617669c6933b7578b94e705e765683f260fcfe30eaa41932610f\"],\"id\":1}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("content-type", "application/json")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
```

```ruby
require 'uri'
require 'net/http'

url = URI("https://rpc.xinfin.network/getTransactionReceipt")

http = Net::HTTP.new(url.host, url.port)
http.use_ssl = true
http.verify_mode = OpenSSL::SSL::VERIFY_NONE

request = Net::HTTP::Post.new(url)
request["content-type"] = 'application/json'
request.body = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getTransactionReceipt\",\"params\":[\"0xa3ece39ae137617669c6933b7578b94e705e765683f260fcfe30eaa41932610f\"],\"id\":1}"

response = http.request(request)
puts response.read_body
```

```python
import http.client

conn = http.client.HTTPSConnection("rpc.xinfin.network")

payload = "{\"jsonrpc\":\"2.0\",\"method\":\"eth_getTransactionReceipt\",\"params\":[\"0xa3ece39ae137617669c6933b7578b94e705e765683f260fcfe30eaa41932610f\"],\"id\":1}"

headers = { 'content-type': "application/json" }

conn.request("POST", "/getTransactionReceipt", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))
```

```java
HttpResponse<String> response = Unirest.post("https://rpc.xinfin.network/getTransactionReceipt")
  .header("content-type", "application/json")
  .body("{\"jsonrpc\":\"2.0\",\"method\":\"eth_getTransactionReceipt\",\"params\":[\"0xa3ece39ae137617669c6933b7578b94e705e765683f260fcfe30eaa41932610f\"],\"id\":1}")
  .asString();
```

`POST /getTransactionReceipt`

Returns the receipt of a transaction by transaction hash.

**Note:** That the receipt is not available for pending transactions.

**Parameters**

- `DATA`, 32 Bytes - hash of a transaction


**Returns**

`Object` - A transaction receipt object, or `null` when no receipt was found:

  - `transactionHash`: `DATA`, 32 Bytes - hash of the transaction.

  - `transactionIndex`: `QUANTITY` - integer of the transactions index position in the block.

  - `blockHash`: `DATA`, 32 Bytes - hash of the block where this transaction was in.

  - `blockNumber`: `QUANTITY` - block number where this transaction was in.

  - `cumulativeGasUsed`: `QUANTITY` - The total amount of gas used when this transaction was executed in the block.

  - `gasUsed`: `QUANTITY` - The amount of gas used by this specific transaction alone.

  - `contractAddress`: `DATA`, 20 Bytes - The contract address created, if the transaction was a contract creation, otherwise `null`.

  - `logs`: `Array` - Array of log objects, which this transaction generated.

  - `logsBloom`: `DATA`, 256 Bytes - Bloom filter for light clients to quickly retrieve related logs.

It also returns either :

  - `root` : `DATA` 32 bytes of post-transaction stateroot (pre Byzantium)

  - `status`: `QUANTITY` either `1` (success) or `0` (failure)

> Body parameter

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getTransactionReceipt",
  "params": [
    "0xa3ece39ae137617669c6933b7578b94e705e765683f260fcfe30eaa41932610f"
  ],
  "id": 1
}
```

<h3 id="gettransactionreceipt-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[getTransactionReceiptRequest](#schemagettransactionreceiptrequest)|true|none|

<h3 id="gettransactionreceipt-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|Successful Operation|None|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|Internal Server Error|None|

<aside class="success">
This operation does not require authentication
</aside>

# Schemas

<h2 id="tocS_clientVersionRequest">clientVersionRequest</h2>
<!-- backwards compatibility -->
<a id="schemaclientversionrequest"></a>
<a id="schema_clientVersionRequest"></a>
<a id="tocSclientversionrequest"></a>
<a id="tocsclientversionrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "web3_clientVersion",
  "params": [],
  "id": 1
}

```

clientVersionRequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_sha3request">sha3request</h2>
<!-- backwards compatibility -->
<a id="schemasha3request"></a>
<a id="schema_sha3request"></a>
<a id="tocSsha3request"></a>
<a id="tocssha3request"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "web3_sha3",
  "params": [
    "0x68656c6c6f20776f726c64"
  ],
  "id": 64
}

```

sha3request

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_versionrequest">versionrequest</h2>
<!-- backwards compatibility -->
<a id="schemaversionrequest"></a>
<a id="schema_versionrequest"></a>
<a id="tocSversionrequest"></a>
<a id="tocsversionrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "net_version",
  "params": [],
  "id": 67
}

```

versionrequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_listeningrequest">listeningrequest</h2>
<!-- backwards compatibility -->
<a id="schemalisteningrequest"></a>
<a id="schema_listeningrequest"></a>
<a id="tocSlisteningrequest"></a>
<a id="tocslisteningrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "net_listening",
  "params": [],
  "id": 67
}

```

listeningrequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_peerCountRequest">peerCountRequest</h2>
<!-- backwards compatibility -->
<a id="schemapeercountrequest"></a>
<a id="schema_peerCountRequest"></a>
<a id="tocSpeercountrequest"></a>
<a id="tocspeercountrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "net_peerCount",
  "params": [],
  "id": 74
}

```

peerCountRequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_protocolVersionRequest">protocolVersionRequest</h2>
<!-- backwards compatibility -->
<a id="schemaprotocolversionrequest"></a>
<a id="schema_protocolVersionRequest"></a>
<a id="tocSprotocolversionrequest"></a>
<a id="tocsprotocolversionrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_protocolVersion",
  "params": [],
  "id": 67
}

```

protocolVersionRequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_syncingrequest">syncingrequest</h2>
<!-- backwards compatibility -->
<a id="schemasyncingrequest"></a>
<a id="schema_syncingrequest"></a>
<a id="tocSsyncingrequest"></a>
<a id="tocssyncingrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_syncing",
  "params": [],
  "id": 1
}

```

syncingrequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_coinbaserequest">coinbaserequest</h2>
<!-- backwards compatibility -->
<a id="schemacoinbaserequest"></a>
<a id="schema_coinbaserequest"></a>
<a id="tocScoinbaserequest"></a>
<a id="tocscoinbaserequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_coinbase",
  "params": [],
  "id": 64
}

```

coinbaserequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_gasPriceRequest">gasPriceRequest</h2>
<!-- backwards compatibility -->
<a id="schemagaspricerequest"></a>
<a id="schema_gasPriceRequest"></a>
<a id="tocSgaspricerequest"></a>
<a id="tocsgaspricerequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_gasPrice",
  "params": [],
  "id": 73
}

```

gasPriceRequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_accountsrequest">accountsrequest</h2>
<!-- backwards compatibility -->
<a id="schemaaccountsrequest"></a>
<a id="schema_accountsrequest"></a>
<a id="tocSaccountsrequest"></a>
<a id="tocsaccountsrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_accounts",
  "params": [],
  "id": 1
}

```

accountsrequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_blockNumberRequest">blockNumberRequest</h2>
<!-- backwards compatibility -->
<a id="schemablocknumberrequest"></a>
<a id="schema_blockNumberRequest"></a>
<a id="tocSblocknumberrequest"></a>
<a id="tocsblocknumberrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_blockNumber",
  "params": [],
  "id": 83
}

```

blockNumberRequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_getBalanceRequest">getBalanceRequest</h2>
<!-- backwards compatibility -->
<a id="schemagetbalancerequest"></a>
<a id="schema_getBalanceRequest"></a>
<a id="tocSgetbalancerequest"></a>
<a id="tocsgetbalancerequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getBalance",
  "params": [
    "0x2b5634c42055806a59e9107ed44d43c426e58258",
    "latest"
  ],
  "id": 1
}

```

getBalanceRequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_getStorageAtRequest">getStorageAtRequest</h2>
<!-- backwards compatibility -->
<a id="schemagetstorageatrequest"></a>
<a id="schema_getStorageAtRequest"></a>
<a id="tocSgetstorageatrequest"></a>
<a id="tocsgetstorageatrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getStorageAt",
  "params": [
    "0x295a70b2de5e3953354a6a8344e616ed314d7251",
    "0x0",
    "latest"
  ],
  "id": 1
}

```

getStorageAtRequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_getTransactionCountRequest">getTransactionCountRequest</h2>
<!-- backwards compatibility -->
<a id="schemagettransactioncountrequest"></a>
<a id="schema_getTransactionCountRequest"></a>
<a id="tocSgettransactioncountrequest"></a>
<a id="tocsgettransactioncountrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getTransactionCount",
  "params": [
    "0xbf1dcb735e512b731abd3404c15df6431bd03d42",
    "latest"
  ],
  "id": 1
}

```

getTransactionCountRequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_getBlockTransactionCountByHashRequest">getBlockTransactionCountByHashRequest</h2>
<!-- backwards compatibility -->
<a id="schemagetblocktransactioncountbyhashrequest"></a>
<a id="schema_getBlockTransactionCountByHashRequest"></a>
<a id="tocSgetblocktransactioncountbyhashrequest"></a>
<a id="tocsgetblocktransactioncountbyhashrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getBlockTransactionCountByHash",
  "params": [
    "0xc8b967161c671ce952a3d50987a78d64157fb5a8e1724804b87d3e9b11e3aa34"
  ],
  "id": 1
}

```

getBlockTransactionCountByHashRequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_getBlockTransactionCountByNumberRequest">getBlockTransactionCountByNumberRequest</h2>
<!-- backwards compatibility -->
<a id="schemagetblocktransactioncountbynumberrequest"></a>
<a id="schema_getBlockTransactionCountByNumberRequest"></a>
<a id="tocSgetblocktransactioncountbynumberrequest"></a>
<a id="tocsgetblocktransactioncountbynumberrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getBlockTransactionCountByNumber",
  "params": [
    "0x52A8CA"
  ],
  "id": 1
}

```

getBlockTransactionCountByNumberRequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_getCodeRequest">getCodeRequest</h2>
<!-- backwards compatibility -->
<a id="schemagetcoderequest"></a>
<a id="schema_getCodeRequest"></a>
<a id="tocSgetcoderequest"></a>
<a id="tocsgetcoderequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getCode",
  "params": [
    "0xa94f5374fce5edbc8e2a8697c15331677e6ebf0b",
    "0x2"
  ],
  "id": 1
}

```

getCodeRequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_signrequest">signrequest</h2>
<!-- backwards compatibility -->
<a id="schemasignrequest"></a>
<a id="schema_signrequest"></a>
<a id="tocSsignrequest"></a>
<a id="tocssignrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_sign",
  "params": [
    "0x9b2055d370f73ec7d8a03e965129118dc8f5bf83",
    "0xdeadbeaf"
  ],
  "id": 1
}

```

signrequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_sendTransactionRequest">sendTransactionRequest</h2>
<!-- backwards compatibility -->
<a id="schemasendtransactionrequest"></a>
<a id="schema_sendTransactionRequest"></a>
<a id="tocSsendtransactionrequest"></a>
<a id="tocssendtransactionrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_sendTransaction",
  "params": [
    {
      "from": "0xb60e8dd61c5d32be8058bb8eb970870f07233155",
      "to": "0xd46e8dd67c5d32be8058bb8eb970870f07244567",
      "gas": "0x76c0",
      "gasPrice": "0x9184e72a000",
      "value": "0x9184e72a",
      "data": "0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675"
    }
  ],
  "id": 1
}

```

sendTransactionRequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[[Param](#schemaparam)]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_Param">Param</h2>
<!-- backwards compatibility -->
<a id="schemaparam"></a>
<a id="schema_Param"></a>
<a id="tocSparam"></a>
<a id="tocsparam"></a>

```json
{
  "from": 1.0393608864131634e+48,
  "to": 1.2127714812045434e+48,
  "gas": 30400,
  "gasPrice": 10000000000000,
  "value": 2441406250,
  "data": 4.537516814050981e+98
}

```

Param

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|from|string|true|none|none|
|to|string|true|none|none|
|gas|string|true|none|none|
|gasPrice|string|true|none|none|
|value|string|true|none|none|
|data|string|true|none|none|

<h2 id="tocS_sendRawTransactionRequest">sendRawTransactionRequest</h2>
<!-- backwards compatibility -->
<a id="schemasendrawtransactionrequest"></a>
<a id="schema_sendRawTransactionRequest"></a>
<a id="tocSsendrawtransactionrequest"></a>
<a id="tocssendrawtransactionrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_sendRawTransaction",
  "params": [
    "0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675"
  ],
  "id": 1
}

```

sendRawTransactionRequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_callrequest">callrequest</h2>
<!-- backwards compatibility -->
<a id="schemacallrequest"></a>
<a id="schema_callrequest"></a>
<a id="tocScallrequest"></a>
<a id="tocscallrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_call",
  "params": [
    {
      "from": "0xb60e8dd61c5d32be8058bb8eb970870f07233155",
      "to": "0xd46e8dd67c5d32be8058bb8eb970870f07244567",
      "gas": "0x76c0",
      "gasPrice": "0x9184e72a000",
      "value": "0x9184e72a",
      "data": "0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675"
    },
    "latest"
  ],
  "id": 1
}

```

callrequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[[Param1](#schemaparam1)]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_Param1">Param1</h2>
<!-- backwards compatibility -->
<a id="schemaparam1"></a>
<a id="schema_Param1"></a>
<a id="tocSparam1"></a>
<a id="tocsparam1"></a>

```json
{
  "from": "",
  "to": "",
  "gas": "",
  "gasPrice": "",
  "value": "",
  "data": ""
}

```

Param1

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|from|string|false|none|none|
|to|string|false|none|none|
|gas|string|false|none|none|
|gasPrice|string|false|none|none|
|value|string|false|none|none|
|data|string|false|none|none|

<h2 id="tocS_estimateGasRequest">estimateGasRequest</h2>
<!-- backwards compatibility -->
<a id="schemaestimategasrequest"></a>
<a id="schema_estimateGasRequest"></a>
<a id="tocSestimategasrequest"></a>
<a id="tocsestimategasrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_estimateGas",
  "params": [
    {
      "from": "0xb60e8dd61c5d32be8058bb8eb970870f07233155",
      "to": "0xd46e8dd67c5d32be8058bb8eb970870f07244567",
      "gas": "0x76c0",
      "gasPrice": "0x9184e72a000",
      "value": "0x9184e72a",
      "data": "0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675"
    }
  ],
  "id": 1
}

```

estimateGasRequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_getBlockByHashRequest">getBlockByHashRequest</h2>
<!-- backwards compatibility -->
<a id="schemagetblockbyhashrequest"></a>
<a id="schema_getBlockByHashRequest"></a>
<a id="tocSgetblockbyhashrequest"></a>
<a id="tocsgetblockbyhashrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getBlockByHash",
  "params": [
    "0x9326145f8a2c8c00bbe13afc7d7f3d9c868b5ef39d89f2f4e9390e9720298624",
    true
  ],
  "id": 1
}

```

getBlockByHashRequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_getBlockByNumberRequest">getBlockByNumberRequest</h2>
<!-- backwards compatibility -->
<a id="schemagetblockbynumberrequest"></a>
<a id="schema_getBlockByNumberRequest"></a>
<a id="tocSgetblockbynumberrequest"></a>
<a id="tocsgetblockbynumberrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getBlockByNumber",
  "params": [
    "0x0",
    true
  ],
  "id": 1
}

```

getBlockByNumberRequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_getBlockSignersByNumberRequest">getBlockSignersByNumberRequest</h2>
<!-- backwards compatibility -->
<a id="schemagetblocksignersbynumberrequest"></a>
<a id="schema_getBlockSignersByNumberRequest"></a>
<a id="tocSgetblocksignersbynumberrequest"></a>
<a id="tocsgetblocksignersbynumberrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getBlockSignersByNumber",
  "params": [
    "0xA61F98"
  ],
  "id": 1
}

```

getBlockSignersByNumberRequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_getBlockSignersByHashRequest">getBlockSignersByHashRequest</h2>
<!-- backwards compatibility -->
<a id="schemagetblocksignersbyhashrequest"></a>
<a id="schema_getBlockSignersByHashRequest"></a>
<a id="tocSgetblocksignersbyhashrequest"></a>
<a id="tocsgetblocksignersbyhashrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getBlockSignersByHash",
  "params": [
    "0x605777ee60ef3ccf21e079fa1b091b0196cf1a2c1dd7c088dd5b1ab03f680b6f"
  ],
  "id": 1
}

```

getBlockSignersByHashRequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_getBlockFinalityByNumberRequest">getBlockFinalityByNumberRequest</h2>
<!-- backwards compatibility -->
<a id="schemagetblockfinalitybynumberrequest"></a>
<a id="schema_getBlockFinalityByNumberRequest"></a>
<a id="tocSgetblockfinalitybynumberrequest"></a>
<a id="tocsgetblockfinalitybynumberrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getBlockFinalityByNumber",
  "params": [
    "0xA61F98"
  ],
  "id": 1
}

```

getBlockFinalityByNumberRequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_getBlockFinalityByHashRequest">getBlockFinalityByHashRequest</h2>
<!-- backwards compatibility -->
<a id="schemagetblockfinalitybyhashrequest"></a>
<a id="schema_getBlockFinalityByHashRequest"></a>
<a id="tocSgetblockfinalitybyhashrequest"></a>
<a id="tocsgetblockfinalitybyhashrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getBlockFinalityByHash",
  "params": [
    "0x605777ee60ef3ccf21e079fa1b091b0196cf1a2c1dd7c088dd5b1ab03f680b6f"
  ],
  "id": 1
}

```

getBlockFinalityByHashRequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_getTransactionByHashRequest">getTransactionByHashRequest</h2>
<!-- backwards compatibility -->
<a id="schemagettransactionbyhashrequest"></a>
<a id="schema_getTransactionByHashRequest"></a>
<a id="tocSgettransactionbyhashrequest"></a>
<a id="tocsgettransactionbyhashrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getTransactionByHash",
  "params": [
    "0xd83b26e101dd6480764bade90fc283407919f60b7e65ff83fbf6cdc92f1138a1"
  ],
  "id": 1
}

```

getTransactionByHashRequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_getTransactionByBlockHashAndIndexRequest">getTransactionByBlockHashAndIndexRequest</h2>
<!-- backwards compatibility -->
<a id="schemagettransactionbyblockhashandindexrequest"></a>
<a id="schema_getTransactionByBlockHashAndIndexRequest"></a>
<a id="tocSgettransactionbyblockhashandindexrequest"></a>
<a id="tocsgettransactionbyblockhashandindexrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getTransactionByBlockHashAndIndex",
  "params": [
    "0x3c82bc62179602b67318c013c10f99011037c49cba84e31ffe6e465a21c521a7",
    "0x0"
  ],
  "id": 1
}

```

getTransactionByBlockHashAndIndexRequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_getTransactionByBlockNumberAndIndexRequest">getTransactionByBlockNumberAndIndexRequest</h2>
<!-- backwards compatibility -->
<a id="schemagettransactionbyblocknumberandindexrequest"></a>
<a id="schema_getTransactionByBlockNumberAndIndexRequest"></a>
<a id="tocSgettransactionbyblocknumberandindexrequest"></a>
<a id="tocsgettransactionbyblocknumberandindexrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getTransactionByBlockNumberAndIndex",
  "params": [
    "0x52A96E",
    "0x1"
  ],
  "id": 1
}

```

getTransactionByBlockNumberAndIndexRequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_getTransactionReceiptRequest">getTransactionReceiptRequest</h2>
<!-- backwards compatibility -->
<a id="schemagettransactionreceiptrequest"></a>
<a id="schema_getTransactionReceiptRequest"></a>
<a id="tocSgettransactionreceiptrequest"></a>
<a id="tocsgettransactionreceiptrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getTransactionReceipt",
  "params": [
    "0xa3ece39ae137617669c6933b7578b94e705e765683f260fcfe30eaa41932610f"
  ],
  "id": 1
}

```

getTransactionReceiptRequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_getCandidatesRequest">getCandidatesRequest</h2>
<!-- backwards compatibility -->
<a id="schemagetcandidatesrequest"></a>
<a id="schema_getCandidatesRequest"></a>
<a id="tocSgetcandidatesrequest"></a>
<a id="tocsgetcandidatesrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getCandidates",
  "params": [
    "latest"
  ],
  "id": 1
}

```

getCandidateStatusRequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

<h2 id="tocS_getCandidateStatusRequest">getCandidateStatusRequest</h2>
<!-- backwards compatibility -->
<a id="schemagetcandidatestatusrequest"></a>
<a id="schema_getCandidateStatusRequest"></a>
<a id="tocSgetcandidatestatusrequest"></a>
<a id="tocsgetcandidatestatusrequest"></a>

```json
{
  "jsonrpc": "2.0",
  "method": "eth_getCandidateStatus",
  "params": [
    "0x1d50df657b6dce50bac634bf18e2d986d807e940",
    "latest"
  ],
  "id": 1
}

```

getCandidateStatusRequest

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|jsonrpc|string|true|none|none|
|method|string|true|none|none|
|params|[string]|true|none|none|
|id|integer(int32)|true|none|none|

