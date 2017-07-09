/**
 * @(#)NamexTweet.java
 *
 * NamexTweet application
 *
 * @author 
 * @version 1.00 2017/5/28
 */
 
import java.io.IOException;

import twitter4j.ResponseList;
import twitter4j.Status;
import twitter4j.Twitter;
import twitter4j.TwitterException;
import twitter4j.TwitterFactory;
import twitter4j.auth.AccessToken;

public class NamexTweet {
    private final static String CONSUMER_KEY ="sLvnHPynjFjaSpFG8H7Q2W84J";
    private final static String CONSUMER_KEY_SECRET ="rQNe33xGg8yUHGLRdtNXwxF2rB8uOE9ytgHtj9pLWG5cQIlZlO";

    public void start() throws TwitterException, IOException {

	Twitter twitter = new TwitterFactory().getInstance();
	twitter.setOAuthConsumer(CONSUMER_KEY, CONSUMER_KEY_SECRET);

	// here's the difference
	String accessToken = getSavedAccessToken();
	String accessTokenSecret = getSavedAccessTokenSecret();
	AccessToken oathAccessToken = new AccessToken(accessToken,
		accessTokenSecret);

	twitter.setOAuthAccessToken(oathAccessToken);
	// end of difference

	twitter.updateStatus("Hi, im updating status again from Namex Tweet for Demo");

	System.out.println("\nMy Timeline:");

	// I'm reading your timeline
	ResponseList<Status> list = twitter.getHomeTimeline();
	for (Status each : list) {

	    System.out.println("Sent by: @" + each.getUser().getScreenName()
		    + " - " + each.getUser().getName() + "\n" + each.getText()
		    + "\n");
	}

    }

    private String getSavedAccessTokenSecret() {
	// consider this is method to get your previously saved Access Token
	// Secret
	return "AhPcTxMVJrpSrimoOPU2GsMOKLyjpt6coEjGvP8qE8TXa";
    }

    private String getSavedAccessToken() {
	// consider this is method to get your previously saved Access Token
	return "1374458160-RWhX2nbwoDha8E7qECAY6cJRQppMe0UmTZSSrSD";
    }

    public static void main(String[] args) throws Exception {
	new NamexTweet().start();
    }
}
