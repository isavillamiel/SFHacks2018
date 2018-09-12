# Download the helper library from https://www.twilio.com/docs/python/install
from twilio.rest import Client
import sys
phone = sys.argv[1]
code = sys.argv[2] #get the appropriate value

phone = "+1"+phone
#get the phone number in a format
#appropriate for twilio

# Your Account Sid and Auth Token from twilio.com/console
account_sid = 'AC382234c3cb09c52e925c89a1ddb8c5dc'
auth_token = '11a378b0b5b0d373290b6a8d24919ea7'
client = Client(account_sid, auth_token)

message = client.messages \
    .create(
         body=' CBTScript Confirmation Code: '+code,
         from_='+14156498615',
         to=phone
     )#second the message

print(message.sid)