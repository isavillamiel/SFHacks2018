  GNU nano 2.8.6                           File: run.py                                      
from flask import Flask
from flask import request
from twilio.twiml.messaging_response import MessagingResponse
import datetime
import service1


app = Flask(__name__)

@app.route("/")
def hello():
     return "CBT Script" #site url

@app.route("/sms", methods =['GET','POST'])
def thanks_reply():
     resp = MessagingResponse()
     now = datetime.datetime.now()
     date = now.strftime("%Y-%m-%d %H:%M")
     name = request.values['From']
     str_1 = name.split('+', 1)
     testing = ".".join(str_1)
     log_name = "log"+date+testing
     record_responses(request.values['From'],request.values['Body'])

     resp.message("Thanks so much for that log!")
     return str(resp)
                                                                                        # cr$
def record_responses(id, msg):
     service1.main(msg,id)

if __name__ == "__main__":
     app.run(debug=True)


^G Get Help    ^O Write Out   ^W Where Is    ^K Cut Text    ^J Justify     ^C Cur Pos
^X Exit        ^R Read File   ^\ Replace     ^U Uncut Text  ^T To Linter   ^_ Go To Line
