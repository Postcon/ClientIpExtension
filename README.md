# ClientIpExtension

This behat extension allows a [`Context`](https://github.com/Behat/Behat/blob/master/src/Behat/Behat/Context/Context.php) object to access the client's IP address. The IP is aquired by requesting a Url (e.g. https://api.ipify.org/).

```yaml
# behat.yml
default:
  extensions:
    Postcon\ClientIpExtension\Extension:
      url: https://api.ipify.org/
```

Alternatively, the IP address can be fixed configured:
```yaml
# behat.yml
default:
  extensions:
    Postcon\ClientIpExtension\Extension:
      value: 1.2.3.4
```

To access the client's IP address, the behat Context class needs to implement [`Postcon\ClientIpExtension\ClientIpInterface`](lib/ClientIpInterface).
