from pymysql import connect
import pandas as pd
import sys

data_base = connect(host= 'localhost',
                    user='root',
                    passwd='',
                    database='mychat'
)

cur = data_base.cursor()
query = 'select * from users_chat'
cur.execute(query)

df = pd.read_sql(query,data_base)

from vaderSentiment.vaderSentiment import SentimentIntensityAnalyzer
sentiment = SentimentIntensityAnalyzer()

# print(df)

df.fillna(".", inplace = True) 

# print(df.to_string())

list1 = df.sender_username.unique()
list2 = pd.unique(df['receiver_username'])

result = [
    (i,j)for i in list1
        for j in list2 
            if i != j ]
# print(result)

# For perticular convo.
def user(person1, person2) :
    convo = df.query('sender_username==@person1 and receiver_username==@person2 or sender_username==@person2 and receiver_username==@person1')["msg_content"]
    # Show chat btw 2 user.
    # print(convo)
    sent = sentiment.polarity_scores(convo)
    # show +ve, -ve, =tral values.
    # print("Sentiment of Chats:", sent)
    
    global status
    global sentiment_dict
    sentiment_dict = sent

    if sentiment_dict['compound'] >= 0.05 :
        # print("Positive")
        status="Positive"

    elif sentiment_dict['compound'] <= - 0.05 :
        # print("Negative")
        status="Negative"

    else :
        # print("Neutral")
        status="Neutral"


convo_df = pd.DataFrame(result,columns=["user1", "user2"])

comp = []
Mood = []

for i in range(len(convo_df)) :
    user((convo_df.user1[i]),convo_df.user2[i])
    comp.append(sentiment_dict['compound'])
    Mood.append(status)

convo_df['Comp'] = comp
convo_df['Mood'] = Mood
# Result.
# print(convo_df)

# print(len(comp))
# print(comp)

data_base.close()


def us(person1, person2) :
    convo2 = df.query('sender_username==@person1 and receiver_username==@person2 or sender_username==@person2 and receiver_username==@person1')["msg_content"]

    sent1 = sentiment.polarity_scores(convo2)
    
    global status1
    global sentiment_dict1
    sentiment_dict1 = sent1
    f = open("var.txt","w")

    if sentiment_dict1['compound'] >= 0.05 :
        status1="Positive"
        # print("Positive")
        f.write("Positive")


    elif sentiment_dict1['compound'] <= - 0.05 :
        status1="Negative"
        # print("Negative")
        f.write("Negative")

    else :
        status1="Neutral"
        # print("Neutral")
        f.write("Neutral")

    f.close()
        

# getting parameters from php

data = sys.argv[1] 
data1 = sys.argv[2]

# Trial Test
# data = "Atharva"
# data1 = "Arjun"
# print(data, data1)

us(data, data1)